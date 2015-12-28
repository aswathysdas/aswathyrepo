create table tbl_login(pk_int_login_id int(11) not null 
primary key auto_increment,vchr_email varchar(30) not null,
vchr_password varchar(30) not null,fk_int_user_role_id 
int(11));