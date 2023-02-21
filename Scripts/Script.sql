SELECT u.id, u.name, u.email, u.image, c.body, c.visible
FROM projeto_sail_1.users u, projeto_sail_1.comments c 
where u.id  = c.user_id(+);

UPDATE projeto_sail_1.users u set u.email = 'hnhostins@hotmail.com' WHERE u.id =1; 

DELETE FROM projeto_sail_1.users
WHERE id=9;
