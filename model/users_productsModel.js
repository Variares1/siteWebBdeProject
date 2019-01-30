'use strict';

let Cart = function(task){
    this.products_id = task.products_id;
    this.users_id = task.users_id;
    this.qty = task.qty;
    this.statut = task.statut;
};

//post a new participation
Cart.createCart = function(new_cart){
//Search the participation in db
    return ["INSERT INTO users_products (products_id, users_id, qty, statut) SELECT * FROM (SELECT ?, ?, ?, ?) AS tmp WHERE NOT EXISTS (SELECT users_id, events_id FROM users_events WHERE users_id = ? AND events_id = ?)", 
    	[new_cart.products_id, new_cart.users_id, new_cart.qty, 0, new_cart.users_id, new_cart.products_id]];               
};
Cart.getCart = function(new_cart){
	if(new_cart!=null){
		if(new_cart.users_id==null && new_cart.products_id!=null){
			if(new_cart.statut==null){
				return ["Select * from users_products where products_id = ? ", new_cart.products_id];
			}
			else{
				return ["Select * from users_products where products_id = ? AND statut = ?", [new_cart.products_id, new_cart.statut]];
			}	        
	    }
	    else if(new_cart.products_id==null && new_cart.users_id!=null){
	    	if(new_cart.statut==null){
	    		return["Select * from users_products where users_id = ? ", new_cart.users_id];
	    	}
	    	else{
	    		return["Select * from users_products where users_id = ? AND statut = ?", [new_cart.users_id, new_cart.statut]];
	    	}
	    }
	    else if(new_cart.statut!=null && new_cart.products_id==null && new_cart.users_id==null){
	    	return ["Select * from users_products where statut = ?", new_cart.statut];
	    }
	    else{
	    	if(new_cart.statut==null){
	    		return ["Select * from users_products where products_id = ? AND users_id = ?", 
	    			[new_cart.products_id, new_cart.users_id]];
	    	}
	    	else{
	    		return ["Select * from users_products where products_id = ? AND users_id = ? AND statut = ?", 
	    		[new_cart.products_id, new_cart.users_id, new_cart.statut]];
	    	}	    	
	    }
	}
	else{
		return["Select * from users_products"];
	}   
};
Cart.update = function(new_cart){
	if(new_cart.qty!=null && new_cart.statut!=null){
		return ["update users_products Set qty = ?, statut = ? where products_id = ? AND users_id = ?", 
			[new_cart.qty, new_cart.statut, new_cart.products_id, new_cart.users_id]];
	}
	else if(new_cart.qty!=null && new_cart.statut==null){
		return ["update users_products Set qty = ? where products_id = ? AND users_id = ?", 
			[new_cart.qty, new_cart.products_id, new_cart.users_id]];
	}
	else if(new_cart.qty==null && new_cart.statut!=null){
		return ["update users_products Set statut = ? where products_id = ? AND users_id = ?", 
			[new_cart.statut, new_cart.products_id, new_cart.users_id]];
	}
	
}
//delete a participation
Cart.remove = function(new_cart){
    return ["DELETE FROM users_products WHERE users_id = ? AND products_id = ?", 
    	[new_cart.users_id, new_cart.products_id]]; 
};
module.exports= Cart;