create table tbl_product(pk_int_prdct_id int(11) not null 
primary key auto_increment,vchr_prdct_nm varchar(30),
int_price int(15),vchr_desc varchar(50),int_quantity int(15),
fk_int_sub_id int(11));