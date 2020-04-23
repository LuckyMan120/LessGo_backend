ALTER TABLE lessgo.users add old_id bigint(20) not null;

# UserMigrationQuery ----------------------------------------------------------
# AddPIN!!!!
INSERT IGNORE INTO lessgo.users (
    name,
    email,  
    password,  
    terms_and_conditions,  
    birthday,  
    gender, 
    community,
    availability,
    estimated_time,
    cartype,
    nro_doc,  
    description,  
    mobile_phone,  
    image,  
    banned,  
    is_admin,  
    active,  
    activation_token , 
    emails_notifications,  
    remember_token,  
    created_at,  
    updated_at,  
    has_pin,
    old_id 
) SELECT

    CASE WHEN name IS NOT NULL THEN name ELSE '' END,
    CASE WHEN email IS NOT NULL AND email <> '' THEN 
        email 
    ELSE  
        CONCAT(id, '@undefined') 
    END,
    null,
    terms_and_conditions,
    birthday,  
    gender,  
    community,
    estimated_time,
    cartype,
    CASE WHEN nro_doc IS NOT NULL THEN nro_doc ELSE '' END,  
    CASE WHEN descripcion IS NOT NULL THEN descripcion ELSE '' END,  
    CASE WHEN mobile_phone IS NOT NULL THEN mobile_phone ELSE '' END,
    '',
    0,
    es_admin,
    1,
    null,
    recibe_mail,
    null,
    created_at,
    updated_at,
    updated_at,
    has_pin,
    id

FROM lessgo.users; 


# Accounts de facebook ----------------------------------------------------------
INSERT IGNORE INTO lessgo.social_accounts (user_id, provider_user_id, provider, created_at, updated_at)
select id, old_id, 'facebook', created_at, updated_at  from lessgo.users;

# Migrations de cars -----------------------------------------------------------
INSERT IGNORE INTO lessgo.cars (patente, description, user_id, created_at, updated_at) 
select SUBSTRING(patente, 1, 10), '', 
    (select lessgo.users.id as id from lessgo.users where lessgo.users.id = lessgo.users.old_id limit 1),
    NOW(), NOW()
from lessgo.users where lessgo.users.patente is not null;


# Migrations de trips -----------------------------------------------------------
alter table lessgo.trips add old_id bigint(20) not null;
INSERT IGNORE INTO lessgo.trips (
  user_id,
  from_town,
  to_town, 
  trip_date,
  description, 
  total_seats, 
  friendship_type_id,
  distance,
  estimated_time,
  community, 
  payment,
  availability,
  co2, 
  is_recurring, 
  is_passenger, 
  mail_send, 
  enc_path, 
  created_at, 
  updated_at, 
  deleted_at, 
  return_trip_id, 
  car_id,
  old_id
) select 
    (select lessgo.users.id as id from lessgo.users where lessgo.trips.user_id = lessgo.users.old_id limit 1) as uid,
    from_town,
    to_town,
    CASE WHEN DATE(trip_date) THEN trip_date  ELSE created_at END,
    description,
    total_seats,
    friendship_type_id,
    distance,
    community,
    estimated_time,
    payment,
    availability,
    co2,
    is_recurring,
    CASE WHEN is_passenger IS NOT NULL THEN is_passenger ELSE false END ,
    CASE WHEN mail_send IS NOT NULL THEN mail_send ELSE true END ,
    '',
    CASE WHEN DATE(created_at) THEN created_at ELSE now() END,
    CASE WHEN DATE(updated_at) THEN updated_at ELSE now() END,
    null,
    null,
    (select lessgo.cars.id as car_id from lessgo.cars where lessgo.cars.user_id = uid limit 1),
    id
from lessgo.trips where trip_date is not null  ;


#passenger migrtions ------------------------------------------------
INSERT IGNORE INTO lessgo.trip_passengers (
    user_id,
    trip_id,
    passenger_type,
    request_state,
    canceled_state,
    created_at,
    updated_at
) select 
    (select lessgo.users.id as id from lessgo.users where lessgo.trip_passengers.user_id = lessgo.users.old_id limit 1) as uid,
    (select lessgo.trips.id as tid from lessgo.trips where lessgo.trip_passengers.trip_id = lessgo.trips.old_id limit 1) as tid,
    passenger_type,
    request_state,
    0,
    CASE WHEN DATE(created_at) THEN created_at ELSE now() END,
    CASE WHEN DATE(updated_at) THEN updated_at ELSE now() END
from lessgo.trip_passengers where passenger_type = 1 ;

#friends migrtions ---------------------------------

 insert into lessgo.friends (
     uid1,
     uid2,
     origin,
     state,
     created_at,
     updated_at
 ) select 
     u1.id,
     u2.id,
     'facebook',
     1,
     now(),
     now()
  from lessgo.friends 
 LEFT JOIN lessgo.users as u1 ON uid1 = u1.old_id
 LEFT JOIN lessgo.users as u2 ON uid2 = u2.old_id
 where u1.id is not null and u2.id is not null;


#ratings migrtions ---------------------------------
INSERT IGNORE INTO lessgo.rating (
    trip_id,
    user_id_from,
    user_id_to,
    user_to_type,
    user_to_state,
    rating,
    comment,
    reply_comment,
    reply_comment_created_at,
    voted,
    rate_at,
    voted_hash,
    created_at,
    updated_at
) select
    t.id,
    u1.id,
    u2.id,
    t.user_id <> to_id,
    1,
    puntuacion,
    comentario,
    '',
    null,
    1,
    lessgo.ratings.updated_at,
    '',
    lessgo.ratings.created_at,
    lessgo.ratings.updated_at
from lessgo.ratings
LEFT JOIN lessgo.trips as t ON lessgo.ratings.trip_id = t.old_id 
LEFT JOIN lessgo.users as u2 on to_id = u2.old_id
LEFT JOIN lessgo.users as u1 on from_id = u1.old_id;

# Migrtions de mensajes ---------------------------------
alter table lessgo.conversations add old_id bigint(20) not null;

INSERT IGNORE INTO lessgo.conversations (
    type,
    title,
    trip_id,
    old_id
) select
    0,
    '',
    null,
    id
from lessgo.conversations;

# creo los users correspondiente a la conversacion
insert into lessgo.conversations_users (
    conversation_id,
    user_id,
    `read`
) select 
    c.id,
    u.id,
    1
from lessgo.conversations
LEFT JOIN lessgo.users as u on user_id = u.old_id
LEFT JOIN lessgo.conversations as c on lessgo.conversations.id = c.old_id
where u.id is not null;

# Migrations de mensajes
INSERT IGNORE INTO lessgo.messages (
    `text`,
    estado,
    user_id,
    conversation_id,
    created_at,
    updated_at
) select 
    mensaje,
    1,
    u.id,
    c.id,
    lessgo.messages.created_at,
    lessgo.messages.updated_at
from lessgo.messages
LEFT JOIN lessgo.users as u on user_id = u.old_id
LEFT JOIN lessgo.conversations as c on conversation_id = c.old_id
where u.id is not null;

INSERT IGNORE INTO lessgo.user_message_read (
    user_id,
    message_id,
    `read`,
    created_at,
    updated_at
) select 
    cu.user_id,
    m.id,
    1,
    now(),
    now()
from lessgo.messages as m
left join lessgo.conversations_users as cu on m.conversation_id = cu.conversation_id and m.user_id <> cu.user_id;


#alter table lessgo.trips drop old_id;
#alter table lessgo.users drop old_id;
#alter table lessgo.conversations drop old_id;

CREATE TEMPORARY TABLE IF NOT EXISTS table2
(
select min(id) as id from conversations 
inner join  (select min(updated_at) as fecha, old_id from conversations where old_id <> 0 group by old_id  order by fecha DESC) as data 
on conversations.old_id  = data.old_id and data.fecha = conversations.updated_at group by conversations.old_id 
) ;
delete from conversations where id in (select * from table2);



mysql> select * from conversations where old_id <> 0 order by updated_at DESC, old_id DESC  limit 100;
+-------+------+-------+---------+---------------------+---------------------+------------+--------+
| id    | type | title | trip_id | created_at          | updated_at          | deleted_at | old_id |
+-------+------+-------+---------+---------------------+---------------------+------------+--------+
| 86260 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-10 04:47:01 | NULL       |  43193 |
| 83635 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-09 13:36:43 | NULL       |  41880 |
| 34856 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-09 04:42:44 | NULL       |  17462 |
| 55710 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-08 20:48:57 | NULL       |  27916 |
| 86475 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-08 11:11:59 | NULL       |  43300 |
| 88443 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-07 20:07:20 | NULL       |  44284 |
| 84539 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-07 17:51:57 | NULL       |  42332 |
| 88482 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-07 14:03:33 | NULL       |  44304 |
| 88480 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-07 07:44:33 | NULL       |  44303 |
| 88371 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-06 17:13:40 | NULL       |  44248 |
| 61647 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-06 14:08:38 | NULL       |  30884 |
| 85239 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-06 10:01:21 | NULL       |  42682 |
| 46100 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-06 09:19:51 | NULL       |  23111 |
| 88452 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-06 06:31:05 | NULL       |  44289 |
| 88018 |    0 |       |    NULL | 2017-08-05 10:11:22 | 2017-08-06 06:30:28 | NULL       |  44072 |
