<script>
    
fetch('get_entries.php')
    .then(response => response.json())
    .then(data => {
        const entriesTable = document.getElementById('entriesTable');
        data.forEach(entry => {
            const row = entriesTable.insertRow();
            row.innerHTML = `
                <td>${entry.username}</td>
                <td>${entry.language}</td>
                <td>${entry.stdin}</td>
                <td>${entry.timestamp}</td>
                <td>${entry.sourceCode.substring(0, 100)}</td>
            `;
        });
    });

</script>