<?php include "templates/header.php"; ?>
    <main class="container">
        <form action="unarm.php" method="POST">
            <div class="jumbotron" style="height: 85vh;">
                <div class="form-row" style="height: 23%; margin-bottom: 2%;">
                    <input id="keycode-input" name="keycode" style="height: 100%; font-size: 4em; text-align: center; color: white;" type="text" class="w-100 form-control bg-secondary" readonly>
                </div>
                <div class="form-row" style="height: 23%; margin-bottom: 2%;">
                    <button type="button" class="col btn btn-lg btn-danger" style="margin-right: 2%; font-size: 3em;" onclick="ClickedKey('1')">1</button>
                    <button type="button" class="col btn btn-lg btn-danger" style="margin-right: 2%; font-size: 3em;" onclick="ClickedKey('2')">2</button>
                    <button type="button" class="col btn btn-lg btn-danger" style="margin-right: 2%; font-size: 3em;" onclick="ClickedKey('3')">3</button>
                    <button type="button" class="col-4 btn btn-lg btn-danger" style="font-size: 3em;" onclick="ClickedKey('backspace')"><i class="fas fa-backspace"></i></button>
                </div>
                <div class="form-row" style="height: 23%; margin-bottom: 2%;">
                    <button type="button" class="col btn btn-lg btn-danger" style="margin-right: 2%; font-size: 3em;" onclick="ClickedKey('4')">4</button>
                    <button type="button" class="col btn btn-lg btn-danger" style="margin-right: 2%; font-size: 3em;" onclick="ClickedKey('5')">5</button>
                    <button type="button" class="col btn btn-lg btn-danger" style="margin-right: 2%; font-size: 3em;" onclick="ClickedKey('6')">6</button>
                    <button type="button" class="col-4 btn btn-lg btn-danger" style="font-size: 3em;" onclick="ClickedKey('0')">0</button>
                </div>
                <div class="form-row" style="height: 23%; margin-bottom: 2%;">
                    <button type="button" class="col btn btn-lg btn-danger" style="margin-right: 2%; font-size: 3em;" onclick="ClickedKey('7')">7</button>
                    <button type="button" class="col btn btn-lg btn-danger" style="margin-right: 2%; font-size: 3em;" onclick="ClickedKey('8')">8</button>
                    <button type="button" class="col btn btn-lg btn-danger" style="margin-right: 2%; font-size: 3em;" onclick="ClickedKey('9')">9</button>
                    <button type="submit" class="col-4 btn btn-lg btn-danger" style="font-size: 3em;"><i class="fas fa-sign-in-alt"></i></button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>