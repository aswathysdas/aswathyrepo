create table tbl_product(pk_int_prdct_id int(11) not null 
primary key auto_increment,vchr_prdct_nm varchar(30),
int_price int(15),vchr_desc varchar(50),fk_int_sub_id int(11),int_sell_price int(15),vchr_product_img varchar(50),vchr_product_side_view varchar(20));