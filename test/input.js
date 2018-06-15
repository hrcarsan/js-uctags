var a;

//tags>>>>a

var b = 2, c = "test";

//tags>>>>b c

var d = 
{
  'e': 3,
  f: {g: 'fdsf'}
};

//tags>>>>d e f g

function simplefun(){}

//tags>>>>simplefun

var var_fun = function ()
{}

//tags>>>>var_fun

 var a /* this is valid */ = "1", b = {c: {d: // single comment
 2}}, e; 

//tags>>>>a b c d e

var /**/ var_after_comment;

//tags>>>>var_after_comment

clase.property_fun = function (){}

//tags>>>>property_fun

var obj = {
  method: function(){}
};

//tags>>>>obj method

function simplefun()
{
  var var_in_fun;
}
//tags>>>>simplefun var_in_fun

function /**/ simplefun/**/() /**/
{
}

//tags>>>>simplefun

