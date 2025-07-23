<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bidding</title>
</head>
<body>
    
    <table id="table-bid" border="1" style="font-size: 78px">
        <tr>
            <td>NAME</td>
            <td>Jumlah</td>
        </tr>
    </table>

<script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
<script>
    var pusher = new Pusher("jhzv8h0asohw96uftmqz", {
        cluster: "",
        enabledTransports: ["ws"],
        forceTLS: false,
        wsHost: "127.0.0.1",
        wsPort: 8080
    });

    var channel = pusher.subscribe("home-admin");

    channel.bind("dashboard-updated", function(data) {
    const labelMap = {
        webvisitorcount: "Web Visitor",
        regiscount: "Registrasi",
        showcasecount: "Showcase",
        linkshortenercount: "Short Link"
    };

    const table = document.getElementById("table-bid");

    // Bersihkan isi lama (selain header)
    while (table.rows.length > 1) {
        table.deleteRow(1);
    }

    // Tambahkan data baru
    for (let key in data) {
        if (data.hasOwnProperty(key)) {
            const row = table.insertRow();
            const cell1 = row.insertCell(0);
            const cell2 = row.insertCell(1);
            cell1.innerHTML = labelMap[key] || key;
            cell2.innerHTML = data[key];
        }
    }
});
</script>

</body>
</html>