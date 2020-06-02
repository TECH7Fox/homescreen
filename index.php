<?php include "templates/header.php"; ?>
    <main>
        <div class="row" style="margin: 0; height: 88vh;">
            <div class="col-3 card">
                <h4 class="card-header">Devices</h4>
                <div class="scrollTable">
                    <table class="table text-center m-0 custom-scrollbar-css">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">Type</th>
                                <th scope="col">Server Name</th>
                                <th scope="col">IP</th>
                            </tr>
                        </thead>
                        <tbody id="serverStatus"></tbody>
                    </table>
                </div>
            </div>

            <div id="message" class="col card">
            </div>

            <div class="col-3 card">
                <h4 class="card-header">Messages</h4>
                <div class="scrollTable">
                    <table class="table text-center m-0">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">Type</th>
                                <th scope="col">Messages</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody id="notifications"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>