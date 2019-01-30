'use strict';

let Img = function(task){
    this.url = task.url;
    this.date = task.date;
    this.products_id = task.products_id;
};
Img.createImg = function(new_img){
//Search the Img in db
    return ["INSERT INTO imgs (url, date) SELECT * FROM (SELECT ?, NOW()) AS tmp WHERE NOT EXISTS (SELECT url FROM imgs WHERE url = ?) LIMIT 1",
    	[new_img.url,new_img.url]];              
};
Img.update = function(id, new_img){
    return ["UPDATE imgs SET products_id = ? WHERE id = ?", [new_img.products_id, id]];
};
Img.getImg = function(id/*, choix*/){
    if(id){
    	/*if (choix==1) {*/
    		return ["Select * from imgs where id = ? ", id];
    	/*}
        else{
        	return ["Select * from imgs where url = ? ", id];
        }*/
    }
    else{return ["Select * from imgs"];}
    
};
//delete a img
Img.remove = function(id){
    return ["DELETE FROM imgs WHERE id = ?", id]; 
};
module.exports= Img;