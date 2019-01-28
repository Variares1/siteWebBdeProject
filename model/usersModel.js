'user strict';

//user object constructor
let User = function(task){
    this.name = task.name;
    this.firstName = task.firstName;
    this.email = task.email;
    this.password = task.password;
    this.centres_id = task.centres_id;
    this.statuts_id = task.statuts_id;
    console.log(this.name);
};
//post a new user
User.createUser = function(newUser) {
    return ["INSERT INTO users (name, firstName, email, password, centres_id, statuts_id) SELECT ?, ?, ?, ?, ?, ? AS tmp WHERE NOT EXISTS (SELECT email FROM users WHERE email = ?)",
        [newUser.name, newUser.firstName, newUser.email, newUser.password, newUser.centres_id, 1, newUser.email]];/*, function (err, res) {

//Search the user in db
    /*sql.query("Select email from users where email = ? ", email, function (err, res) {
        console.log(Object.getOwnPropertyNames(res).length);
        if(err){
            console.log("error: ", err);
            result(err, null);
        }   
        else{
            if(Object.getOwnPropertyNames(res).length!=2){//test if the user exist in db
                //post the new user
                sql.query("INSERT INTO users set ?", newUser, function (err, res) {  
                    if(err) {
                        console.log("error: ", err);
                        result(err, null);
                    }
                    else{
                        console.log(res.insertId);
                        result(null, res.insertId);
                    }
                });
            }
            else{
                result(null, null);
            }            
        }
    });*/
               
};
User.getUser = function(id, choix, test){
    if(id){
        if(choix==1){
            if(test==false){
                return ["Select * from users where id = ? ", id];
            }
            else{
                return ["Select * from users where email = ? ", id];
            }
        }
        else{
            return ["Select password, statuts_id from users where email = ?", id];
        } 
    }
    else{
        return ["Select * from users"];
    }  
}
/*User.getUserById = function(choix, id, test, result, sql) {
    if(choix==1){
        if(test == false){
            sql.query("Select * from users where id = ? ", id, function (err, res) {             
                if(err) {
                    console.log("error: ", err);
                    result(err, null);
                }
                else{
                    result(null, res);
                }              
            }); 
        }
        else{
            sql.query("Select * from users where email = ? ", id, function (err, res) {             
                if(err) {
                    console.log("error: ", err);
                    result(err, null);
                }
                else{
                    result(null, res);
                }              
            });
        }     
    }
    else{
        //"Select if(password = ?, password, '') as password from users where email = ?",[hpassword, id]
        sql.query("Select password, statuts_id from users where email = ?", id, function (err, res) {             
            if(err) {
                console.log("error: ", err);
                result(err, null);
            }
            else{
                console.log('res : ', res);
                result(null, res);
            }              
        });
    }      
};
//return all users
User.getAllUsers = function(result, sql) {
    sql.query("Select * from users", function (err, res) {
        if(err) {
            console.log("error: ", err);
            result(null, err);
        }
        else{
            console.log('users : ', res);  
            result(null, res);
        }
    });   
};*/
//update info of a user
User.update = function(id, user){
    console.log(user);
    if(user.password!=null){
        return ["UPDATE users SET password = ? WHERE id = ?", [user.password, id]];
    }
    if(user.centres_id!=null){
        return ["UPDATE users SET centres_id = ? WHERE id = ?", [user.centres_id, id]];
    }
    if(user.statuts_id!=null){
        return ["UPDATE users SET statuts_id = ? WHERE id = ?", [user.statuts_id, id]];
    }  
};
//delete a user
User.remove = function(id){
    return ["DELETE FROM users WHERE id = ?", id];
};

module.exports= User;