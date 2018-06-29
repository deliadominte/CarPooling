select s.data , s.locuridisponibile, s.ora, b.x, b.y
from calatorie s, punct b, drumdepuncte c
where id_utilizator = '$id_owner' and c.id_calatorie = s.id and b.id = c.id_punct