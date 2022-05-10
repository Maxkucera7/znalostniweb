

function Funguuuj(cisloOtazky){
	let jedna=0;
	let strinos='';
	$.get("mezi.php",{cisloOtazky:cisloOtazky},function(data){ //poslani a prijem dat pocet otazek k testu
		let pocet = parseInt(data);
		for (i = 0; i < pocet; i++) { 
			for(j=0;j<3;j++){
			    if($("#o"+i).children('input').eq(j).is(":checked")){
			    	if($("#o"+i).children('input').eq(j).val()==1){
			    		jedna++;
			    	}else{
			    		for(p=0;p<3;p++){
			    			if($("#o"+i).children('input').eq(p).val()==1){
			    				strinos+=" "+(i+1)+") "+$("#o"+i).children('input').eq(p).attr("id");
			    			}
			    		}
			    	}
			    }
			}
		}
		let k = (jedna/pocet)*100;
			$.get("mezi.php",{vysledek:k,cisloOt:cisloOtazky},function(dataS){ //zaslani dat pro ulozeni vysledku
			console.log("Úspěšnost: "+k+"% Nesprávné odpovědi: "+strinos);
			$("#vysledovac").html("Úspěšnost: "+k+"% Nesprávné odpovědi: "+strinos);
			$("#vysledovac").show();
		});
	});
}

