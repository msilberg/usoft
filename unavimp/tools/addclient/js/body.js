var bUrl = "http://localhost/public_html/unavimp/tools/addclient/";
			var urlAdd = bUrl + "add.php?";
			var urlOtp = bUrl + "otp.php?stores="
			var chAll = false;
			function strReplace(search,replace,subject){
				if(!(replace instanceof Array)){
					replace=new Array(replace);
					if(search instanceof Array){
						while(search.length>replace.length){ replace[replace.length]=replace[0] }
					}
				}
				if(!(search instanceof Array))search=new Array(search);
				while(search.length>replace.length){ replace[replace.length]=''	}
				if(subject instanceof Array){
					for(k in subject){ subject[k]=str_replace(search,replace,subject[k]) }
					return subject;
				}
				for(var k=0; k<search.length; k++){
					var i = subject.indexOf(search[k]);
					while(i>-1){
						subject = subject.replace(search[k], replace[k]);
						i = subject.indexOf(search[k],i);
					}
				}
				return subject;
			}
			function clearAll(){
				$(".adf").val('');
				$("div.sch-list").hide();
				$("div.add-client").hide();
			}
			function markAll(){
				if (chAll){
					$("input.st-ch").prop('checked', false);
					chAll = false;
				}else{
					$("input.st-ch").prop('checked', true);
					chAll = true;
				}
			}
			function getSelected(){
				var request = null;
				var storeId = [];
				var storesStr = "";
				var sname = $("input.sname").val();
				var fname = $("input.fname").val();
				var mname = $("input.mname").val();
				for (var i=0; i < $("input.st-ch").length; i++){ if ($("input.st-ch").eq(i).is(':checked')){ storeId.push( $("input.st-ch").eq(i).val() ) } };
				$.each(storeId, function(i,val){
					storesStr += val;
					if ((i + 1) < storeId.length){ storesStr += "," }
				});
				if ((sname.length == 0) || (fname.length == 0) || (mname.length == 0)){
					alert('необходимо заполнить все поля');
					return false;
				}else if (storeId.length == 0){
					alert('необходимо выбрать магазины для добавления');
					return false;
				}
				request = "sn=" + sname + "&fn=" + fname + "&mn=" + mname + "&stores=" + storesStr;
				$.get(urlAdd + request);
				clearAll();
			}
			function findStores(){
				if ($("textarea#stores").val().length == 0){
					alert('для поиска необходимо заполнить поле имен магазинов');
					return false;
				}
				$("div.sch-list").show();
				$("div.add-client").show();
				$("div.sch-list-cont").load(urlOtp + strReplace(' ','',$("textarea#stores").val()));
			}
			$(document).ready(function(){
				$("div.add-client").on("click", getSelected);
				$("div.find-stores").on("click", findStores);
				$("div.reset").on("click", clearAll);
				$("div.mark-all").live("click", markAll);
			});