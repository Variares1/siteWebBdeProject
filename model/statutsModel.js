'use strict';

//centre object constructor
let Statut = function(task){
    this.statuts = task;
};

Statut.getStatut = function(id){
    if(id){
        return ["Select * from statuts where id = ? ", id];
    }
    else{return ["Select * from statuts"];}
    
};

module.exports= Statut;