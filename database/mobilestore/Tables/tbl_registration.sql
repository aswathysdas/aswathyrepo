create table tbl_registration(pk_int_reg_id int(11) not null primary key
 auto_increment,vchr_fname varchar(30),vchr_lname varchar(30),
vchr_address varchar(50),int_pincode int(11),int_mobilenum int(11),
fk_int_login_id int(11),dat_date date,vchr_status varchar(20));