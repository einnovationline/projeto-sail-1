SELECT u.id, u.name, u.email, u.image, c.body, c.visible
FROM projeto_sail_1.users u, projeto_sail_1.comments c 
where u.id  = c.user_id;

SELECT * from projeto_sail_1.users u 

