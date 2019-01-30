'use strict';

//centre object constructor
let Statut = function(task){
    this.statuts = task;
};
Statut.createStatut = function(new_statut){
//Search the centre in db
    return ["INSERT INTO statuts (statut) SELECT * FROM (SELECT ?) AS tmp WHERE NOT EXISTS (SELECT statut FROM statuts WHERE statut = ?) LIMIT 1", 
    	[new_statut.statut,new_statut.statut]];             
};
Statut.update = function(id, new_statut){
    return ["UPDATE statuts SET statut = ? WHERE id = ?", [new_statut.statut, id]];
};
Statut.getStatut = function(id){
    if(id){
        return ["Select * from statuts where id = ? ", id];
    }
    else{return ["Select * from statuts"];}
    
};
Statut.remove = function(id){
    return ["DELETE FROM statuts WHERE id = ?", id]; 
};

module.exports= Statut;