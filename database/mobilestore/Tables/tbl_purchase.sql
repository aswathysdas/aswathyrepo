create table tbl_purchase(pk_int_purchase_id int(11) not null 
primary key auto_increment,fk_int_product_id int(11),int_quantity 
int(15),int_total_amount int(11),dat_date date,fk_int_login_id int(15));