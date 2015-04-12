<?php
# File: pgsql.php
try
{
    $db = new PDO('pgsql:dbname=my_db_name;host=127.0.0.1','myloginuser','somepassword');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->query(create_sql());
    $db->query(insert_sql());

    $selectSQL = "SELECT * FROM users";
    $results = $db->query($selectSQL);

    foreach($results as $row)
    {
        var_dump($row);
    }

} catch(\Exception $e)
{
    echo $e->getMessage()."\n";
}

function create_sql()
{
    return "CREATE TABLE users (
    id serial PRIMARY KEY,
    email varchar(100) NOT NULL,
    password varchar(255) NOT NULL
)";
}
function insert_sql()
{
    return "INSERT INTO users (email, password) VALUES ('me@example.com', 'plaintext!')";
}








