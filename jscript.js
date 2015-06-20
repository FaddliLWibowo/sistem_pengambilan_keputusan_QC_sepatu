// JavaScript Document
	function confirmdelete(msg)
	{
       question = confirm("Apakah Anda yakin untuk Menghapus " + msg + " ?");
         if (question !="0")
		 {
             return true;
         } 
		 else 
		 {
             return false;
         }
    }
	
	function upload(url) 
	{
  	window.open(url,"ZaQ","width=320,height=145,screenX=50,toolbars=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable='no'")
	}
	
	function download(url) 
	{
  	window.open(url,"ZaQ","width=420,height=231,screenX=50,toolbars=0,location=0,directories=0,status=0,menubar=0,scrollbars=0,resizable='no'")
	}

	function petalokasi(url) 
	{
  	window.open(url,"ZaQ","width=450,height=650,screenX=50,toolbars=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable='no'")
	}

	function petalokasi2(url) 
	{
  	window.open(url,"ZaQ","width=450,height=500,screenX=50,toolbars=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable='no'")
	}


	function formatangka(objek) 
	{
  	a = objek.value;
  	b = a.replace(/[^\d]/g,"");
  	c = "";
  	panjang = b.length;
  	j = 0;
  	for (i = panjang; i > 0; i--) {
    j = j + 1;
    if (((j % 3) == 1) && (j != 1)) {
      c = b.substr(i-1,1) + c;
    } else {
      c = b.substr(i-1,1) + c;
    }
  	}
  	objek.value = c;
	}
	
	function Popreport_look_mhs(url)
    { 
	window.open(url,"ZaQ","width=340,height=310,screenX=50,toolbars=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable='no'")	
	} 

	function Popreport_mhs(url)
    { 
	window.open(url,"ZaQ","width=430,height=250,screenX=50,toolbars=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable='no'")	
	} 
	
	function Popreport_look_mtkopen(url)
    { 
	window.open(url,"ZaQ","width=740,height=400,screenX=50,toolbars=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable='no'")	
	} 

