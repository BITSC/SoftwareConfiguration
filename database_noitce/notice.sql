 CREATE TABLE NOTICE(
	id int not null,
	title nvarchar(50) not null,
	content  nvarchar(2000) not null,
	time datetime null,
	unit nvarchar(50) not null
	PRIMARY KEY (id)
 );