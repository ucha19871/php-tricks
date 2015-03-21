<?php

/*
 Change Nickname

The following form enables users to change their nickname on a website:

<form >
    <input type="text" name="oldNickName" value="/>
    <input type="text" name="newNickName" value="/>
    <input type="submit" name="submit" />
</form>





The users are stored in an array as follows:

$users = array(
    array(
        'username’=>'james',
        'nickname’ => 'web_master',
    ),
    array(
        'username’=>'carlos',
        'nickname’ => 'super_carlos',
    ),
);

 Create a function changeNickname that can be used to determine if a nickname can be updated.
 The function will take 3 parameters: the old nickname (oldNickname), the new nickname (newNickname) and
 the list of existing users (users).

 The function should check that the following conditions are met:

- The old nickname must be listed in the existing users list.
- The new nickname must **not** be listed in the existing users list.
- The new nickname may only consist of alphanumeric characters and the following special characters. ($,#,<,>,-,_)
- The new nickname cannot start with a number.

 If the new nickname and old nickname meet the above conditions, then the function should print to standard output
 the message “Your nickname has been changed from $oldnickname to $newnickname”.
 If the nickname doesn't meet the above restrictions, then the function should print to standard output "Failed to update”.

    Sample Input

    oldNickname: "web_master"
    newNickname: "james_web_master"
    users: {{username=>"james",nickname=>"web_master"},{username=>"carlos",nickname=>"super_carlos”}}

    Sample Output
    Your nickname has been changed from web_master to james_web_master

    Additional Samples

    oldNickname: "web_master"
    newNickname: "8james_web_master8"
    users: {{username=>"james",nickname=>"web_master"},{username=>"carlos",nickname=>"super_carlos”}}

    => Failed to update
    Note
    The function should properly validate and sanitize the new nickname field prior to printing it to standard output.

    Code Template:

 * */

$users = [
    [
        'username'=>'james',
        'nickname' => 'web_master',
    ],
    [
        'username'=>'carlos',
        'nickname' => 'super_carlos',
    ],
];

function changeNickname($oldNickname, $newNickname, $users){
    $valid = preg_match('/^(([^0-9])+([A-Za-z0-9\$\#\<\>\-\_]+))$/i', $newNickname, $matches);
    if($valid == true){
        $old = false;
        $new = false;
        foreach($users as $id => $user){
            if($user['nickname'] == $oldNickname){
                $old = true;
            }
            if($user['nickname'] == $newNickname){
                $new = true;
            }
        }
        if($old == true && $new == false){
            echo 'Your nickname has been changed from '.$oldNickname.' to '.$newNickname;
        } else {
            echo 'Failed to update';
        }
    } else {
        echo 'Failed to update';
    }
}
// Do NOT call the changeNickname function in the code
// you write. The system will call it automatically.
// Do NOT call the changeNickname function in the code
// you write. The system will call it automatically.

