delimiter //
drop procedure sp10//

CREATE PROCEDURE sp10 ()
    -> BEGIN
    ->   DECLARE a INT DEFAULT 5;
    ->   DECLARE b INT /* here no DEFAULT clause */;
    ->   SET b = 5;    /* there is a SET statement */
    ->   INSERT INTO t VALUES (a);
    ->   SELECT s1 * a FROM t WHERE s1 >= b;
    -> END; //
