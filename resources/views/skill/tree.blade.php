@extends('layout')

<link rel="stylesheet" type="text/css" href="{{asset('css/inspector.css')}}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>

<script>
  var resData
  $(document).ready(function() {

    $.ajax({
        method: "GET",
        url: "/skills/gettree",
        dataType: 'json',
      })
      .done(function(msg) {
        console.log(msg)
        resData = msg
      });

  });
</script>
<script type="module">
  import define from "{{asset('js/index.js')}}";
  import {
    Runtime,
    Library,
    Inspector
  } from "{{asset('js/runtime.js')}}";

  const runtime = new Runtime();
  const main = runtime.module(define, Inspector.into(document.body));
</script>