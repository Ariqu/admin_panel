// set up text to print, each item in array is new line
var aText = new Array(
    "Bardzo się cieszymy że odwiedziłeś nasz peron Polskie Koleje Bassowe" , 
    "Ostrzegamy przed mocnymi turbolencjami spowodowanymi mocnymi bassami",
     "więc radzimy zachować szczególną ostrożność.",
     "Nasz zespół chętnie cię przyjął do naszego grona",
      "Udanej podróży ~ Polskie Koleje Bassowe ",
    
      
    );
    var iSpeed = 50; // time delay of print out
    var iIndex = 0; // start printing array at this position
    var iArrLength = aText[1].length; // the length of the text array
    var iScrollAt = 20; // start scrolling up at this many lines
     
    var iTextPos = 0; // initialise text position
    var sContents = ''; // initialise contents variable
    var iRow; // initialise current row
     
    function typewriter()
    {
     sContents =  ' ';
     iRow = Math.max(0, iIndex-iScrollAt);
     var destination = document.getElementById("typedtext");
     
     while ( iRow < iIndex ) {
      sContents += aText[iRow++] + '<br />';
     }
     destination.innerHTML = sContents + aText[iIndex].substring(0, iTextPos) + "_";
     if ( iTextPos++ == iArrLength ) {
      iTextPos = 0;
      iIndex++;
      if ( iIndex != aText.length ) {
       iArrLength = aText[iIndex].length;
       setTimeout("typewriter()", 100);
      }
     } else {
      setTimeout("typewriter()", iSpeed);
     }
    }
    
    
    typewriter();