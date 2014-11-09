$db ['default'] ['username'] = 'root';
$db ['default'] ['password'] = 'avtoeradbroot19';

mysql -u root -p avtoeradbroot19

mysql -h localhost -u root -pavtoeradbroot19 avtoera

DELIMITER //
 CREATE PROCEDURE GetAllProducts()
   BEGIN
   SELECT COUNT(*)  FROM shop_products;
   END //
 DELIMITER ;