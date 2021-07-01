<!DOCTYPE html>
<html>
<head>
<style>
.button {
    background-color: blue; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 0px 0px 150px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    /*float: left;*/
}
</style>
</head>
<body>
	<h2>Hi Welcome to Test Mail : {{$nama->nama}}</h2>
	<a href="{{url('show_reset/'.$nama->id)}}" class="button">RESET</a>
</body>
</html>