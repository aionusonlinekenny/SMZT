function reload()
{
	window.onbeforeunload=null;
	window.parent.location.reload();
}