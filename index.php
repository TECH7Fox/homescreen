<?php include "templates/header.php"; ?>
    <main>
        <div class="row" style="margin: 0; height: 100%;">
            <div class="col-3 card">
                <h4 class="card-header">Devices</h4>
                <div class="scrollable-table">
                    <table class="table text-center m-0">
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

            <div class="col card" style="margin: 0;">
                <h4 class="card-header">Main</h4>
                <div id="message" class="card-body" style="height: 85%;"></div>
                <div class="card-footer" style="height: 25%;">
                    <a role="button" href="alarm.php" style="height: 100%; display: flex; align-items: center;" class="btn btn-block btn-danger">
                        <i class="fas fa-lock" style="font-size: 3em; margin-left: auto; margin-right: auto;"></i>
                    </a>
                </div>
            </div>

            <div class="col-3 card">
                <h4 class="card-header">Messages</h4>
                <div class="scrollable-table">
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