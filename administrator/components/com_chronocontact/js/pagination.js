function gotoPage(pageIndex) {

	document.getElementById("sayfa" + seciliSayfa).style.display = "none";

	document.getElementById("sayfa" + pageIndex).style.display = "block";

	seciliSayfa = pageIndex;

	document.getElementById("goNextButton").disabled = false;
	document.getElementById("goPreviousButton").disabled = false;
	
	if (seciliSayfa == sayfaSayisi)
		document.getElementById("goNextButton").disabled = true;

	if (seciliSayfa == "1")
		document.getElementById("goPreviousButton").disabled = true;
}

function goNextPage() {
	document.getElementById("sayfa" + seciliSayfa).style.display = "none";
	if (seciliSayfa != sayfaSayisi)
		seciliSayfa++;
	document.getElementById("sayfa" + seciliSayfa).style.display = "block";
	if (seciliSayfa == sayfaSayisi)
		document.getElementById("goNextButton").disabled = true;

	document.getElementById("goPreviousButton").disabled = false;
}

function goPreviousPage() {
	document.getElementById("sayfa" + seciliSayfa).style.display = "none";
	if (seciliSayfa != "1")
		seciliSayfa--;
	document.getElementById("sayfa" + seciliSayfa).style.display = "block";
	if (seciliSayfa == "1")
		document.getElementById("goPreviousButton").disabled = true;

	document.getElementById("goNextButton").disabled = false;
}