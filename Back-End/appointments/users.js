function setUpdateAction() {
document.frmUser.action = "leaveapproval.php";
document.frmUser.submit();
}
function setRejectAction() {
 
document.frmUser.action = "leaverejection.php";
document.frmUser.submit();

}
function setDeleteAction() {
 
document.frmUser.action = "leavedelete.php";
document.frmUser.submit();

}