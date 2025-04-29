<div class="sidebar">
    <ul>
        <li>
            <img id="admin_Details" src="../icon/admin.png" />
            <span id="admin_Name">__Admin_Name</span>
            <br><br><br><br>
        </li> 
        <br>
        <b>
            <li>
                <a href="admin_dashboard.php">
                    <img src="../icon/dashboard.png" alt="Dashboard" width="35px" style="vertical-align: middle; margin-right: 5px;" />
                    Dashboard
                </a>
            </li>
            <li>
                <a href="admin_dispensary.php">
                    <img src="../icon/dispensary.png" alt="Dispensary" width="35px" style="vertical-align: middle; margin-right: 5px;" />
                    Dispensary
                </a>
            </li><br>
            <li>
                <a href="admin_doctor.php">
                    <img src="../icon/doctor.png" alt="Doctor" width="35px" style="vertical-align: middle; margin-right: 5px;" />
                    Doctor
                </a>
            </li><br>
            <li>
                <a href="admin_patient.php">
                    <img src="../icon/patient.png" alt="Patient" width="35px" style="vertical-align: middle; margin-right: 5px;" />
                    Patient
                </a>
            </li><br>
            <li>
                <a href="admin_settings.php">
                    <img src="../icon/settings.png" alt="Settings" width="35px" style="vertical-align: middle; margin-right: 5px;" />
                    Settings
                </a>
            </li><br>
        </b>
    </ul>
</div>

<script>
function getCookies(name) {
    let decodedCookies = decodeURIComponent(document.cookie);
    let cookies = decodedCookies.split(';');
    name = name + "=";
    for(let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim();
        if (cookie.indexOf(name) === 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }
    return "";
}


window.onload = function() {
    let adminName = getCookies('adminName'); 
    if (adminName) {
        document.getElementById('admin_Name').innerText = adminName;
    }
}
</script>
