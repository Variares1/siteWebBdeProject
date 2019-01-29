'use strict';

let Product = function(task){
    this.name = task.name;
    this.description = task.description;
    this.price = task.price;
    this.stock = task.stock;
    this.nb_com = task.nb_com;
};

//post a new product
Product.createProduct = function(new_product){
//Search the product in db
    return ["INSERT INTO products (name, description, price, stock, nb_com) SELECT * FROM (SELECT ?, ?, ?, ?, ?) AS tmp WHERE NOT EXISTS (SELECT name FROM products WHERE name = ?)", 
    	[new_product.name, new_product.description, new_product.price, new_product.stock, 0, new_product.name]];              
};
Product.update = function(id, new_product, champ){
	if(champ=='stock'){
		return ["UPDATE products SET stock = ? WHERE id = ?", [new_product.stock, id]];
	}
    else if(champ=='nb_com'){
    	return ["UPDATE products SET nb_com = ?, stock = (SELECT stock  WHERE id = 1)-?  WHERE id = ?", 
    		[new_product.nb_com, new_product.nb_com, id]];
    }
    else if(champ=='price'){
    	return ["UPDATE products SET price = ? WHERE id = ?", [new_product.price, id]];
    }
};
Product.getProduct = function(id){
    if(id){
        return ["Select * from products where id = ? ", id];
    }
    else{return ["Select * from products"];}
    
};
Product.orderBy = function(){
	return ["Select * from products order by nb_com"];
}
//delete a product
Product.remove = function(id){
    return ["DELETE FROM products WHERE id = ?", id]; 
};
module.exports= Product;