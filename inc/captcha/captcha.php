     <script type="text/javascript">
     
     pos=Array ('1.PNG','2.PNG','3.PNG','4.PNG','5.PNG','6.PNG','7.PNG','8.PNG','9.PNG' ); // tableau d'image
     rnd=Array ('rien','rien','rien','rien','rien','rien','rien','rien','rien');
     click=0;
     elemPos=null;
     elemVal=null;
     
     function alea(){
      return Math.floor(Math.random() *9);
    }
    function win() { for (var i=0; i<9 ;i++) if((document.images[i].src).indexOf(pos[i],0)==-1)return false; return true;}
    function test(a){
      console.log('test',a)
      for (var i = 0; i < 9; i++) {
        console.log(rnd[i]);
        if (rnd[i]==a) return true;
      }
      return false;
    }
    
    function start() {
      rnd=Array ('rien','rien','rien','rien','rien','rien','rien','rien','rien');
      for (var i = 0; i < 9; i++) {
        var j=alea();
        while (test(pos[j])) {
          j=alea();
        }
        rnd[i]=pos[j];
      }
      for (var i = 0; i < 9; i++) {
        document.images[i].src=rnd[i];
      }
    }
    
    function dep(id) {
      let imgSrc=document.images[id-1].src.substr();
      console.log(document.images[id-1].src, imgSrc, id);
      if (click == 0) {
        console.log('click 0');
        elemPos=id-1;
        elemVal= imgSrc;
        click = 1;
        return;
        
      }
      if (click == 1) {
        
        console.log('click 1');
        document.images[elemPos].src = imgSrc;
        document.images[id-1].src = elemVal;
        click = 0;
        elemPos=null;
        if(win()){
          var str='<img src="bravo.png"  width="300"  heigth="300">'
          document.getElementById('toto').innerHTML=str;
          
        }
        return;
        
        
      }
      
    }
    
</script>
  <div id="toto">
    <table cellpadding="0" cellSpadding="0">
      
      <tr>
        <td><a href="#" onclick="dep(1)"><img src="1.PNG"></a></td>
        <td><a href="#" onclick="dep(2)"><img src="2.PNG"></a></td>
        <td><a href="#" onclick="dep(3)"><img src="3.PNG"></a></td>
      </tr>
      <tr>
        <td><a href="#" onclick="dep(4)"><img src="4.PNG"></a></td>
        <td><a href="#" onclick="dep(5)"><img src="5.PNG"></a></td>
        <td><a href="#" onclick="dep(6)"><img src="6.PNG"></a></td>
      </tr>
      <tr>
        <td><a href="#" onclick="dep(7)"><img src="7.PNG"></a></td>
        <td><a href="#" onclick="dep(8)"><img src="8.PNG"></a></td>
        <td><a href="#" onclick="dep(9)"><img src="9.PNG"></a></td>
      </tr>
    </table>
  </div>
  <!--<div id="but">
  <form> <input type="button" value="lecture aléatoire" onclick="start()" id="but1" id="but2"> </form>
  </div>-->
