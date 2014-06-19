<script>
function pgdelconf(int)
{
xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","index.php?pg_helper="+int,true);
xmlhttp.send();
}
</script>

<script>
function pgdel()
{
xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","index.php?delete_pg="+1,true);
xmlhttp.send();
}
</script>

<script>
function msgdelconf(string)
{
xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","index.php?id_helper="+string,true);
xmlhttp.send();
}
</script>

<script>
function msgdel()
{
xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","index.php?delete_msg="+1,true);
xmlhttp.send();
}
</script>