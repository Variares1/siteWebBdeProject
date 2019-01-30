'use strict';

//Comment object constructor
let Comment = function(task){
    this.comment = task.comment;
    this.users_id = task.users_id;
    this.comments_id = task.comments_id;
    this.imgs_id = task.imgs_id;
};
//post a new Comment
Comment.createComment = function(new_comment){
//Search the Comment in db
	//"INSERT INTO comments (comment) SELECT * FROM (SELECT ?) AS tmp WHERE NOT EXISTS (SELECT center FROM centers WHERE center = ?) LIMIT 1"
    return ["INSERT INTO comments SET ?", new_comment];              
};
Comment.update = function(id, new_comment){
    return ["UPDATE comments SET imgs_id = ? WHERE id = ?", [new_comment.imgs_id, id]];
};
Comment.getComment = function(id){
    if(id){
        return ["Select * from comments where id = ? ", id];
    }
    else{return ["Select * from comments"];}
    
};
//delete a center
Comment.remove = function(id){
    return ["DELETE FROM comments WHERE id = ?", id]; 
};
module.exports= Comment;