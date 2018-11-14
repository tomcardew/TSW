<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nivel 1</title>
    <link rel="stylesheet" href="../css/styleLvl1.css">
</head>

<body>
    <!--
        1. HTML
        2. CSS
        3. div.background 1200x800
        4. div.hero 50x50
        5. move left / right (bonus: move up/down)  (bonus: move hero with mouse)
        6. fire 17x47
        7. game loop
        8. div.enemy
        9. enemy objects / enemy movement
        10. collision detection
    -->
    <div id="background" style="height: 100%; width: 100%;">
        <div id="hero"></div>
        <div id="missiles"></div>
        <div id="enemies"></div>
        <div id="vidas"></div>
    </div>

    <script>
        var hero = {
            left: 575,
            top: 700
        };
        var a = [];
        var b = 0;
        var missiles = [];

        var enemies = [{
                left: 200,
                top: 100
            },
            {
                left: 300,
                top: 100
            },
            {
                left: 400,
                top: 100
            },
            {
                left: 500,
                top: 100
            },
            {
                left: 600,
                top: 100
            },
            {
                left: 700,
                top: 100
            },
            {
                left: 800,
                top: 100
            },
            {
                left: 900,
                top: 100
            },
            {
                left: 200,
                top: 175
            },
            {
                left: 300,
                top: 175
            },
            {
                left: 400,
                top: 175
            },
            {
                left: 500,
                top: 175
            },
            {
                left: 600,
                top: 175
            },
            {
                left: 700,
                top: 175
            },
            {
                left: 800,
                top: 175
            },
            {
                left: 900,
                top: 175
            },
            {
                left: 700,
                top: 250
            },
            {
                left: 800,
                top: 250
            }
        ];


        document.onkeydown = function (e) {
            if (e.keyCode === 37) {
                // Left
                if (hero.left >= 200) {
                hero.left = hero.left - 10;
                }
            }
            if (e.keyCode === 39) {
                // Right
                if (hero.left <= 900) {
                hero.left = hero.left + 10;
                }
            }
            if (e.keyCode === 32) {
                // Spacebar (fire)
                missiles.push({
                    left: hero.left + 20,
                    top: hero.top - 20
                });
                drawMissiles()
            }
            drawHero();
        }


        function drawHero() {
            document.getElementById('hero').style.left = hero.left + 'px';
            document.getElementById('hero').style.top = hero.top + 'px';
        }

        function drawMissiles() {
            document.getElementById('missiles').innerHTML = ""
            for (var i = 0; i < missiles.length; i++) {
                document.getElementById('missiles').innerHTML +=
                    `<div class='missile1' style='left:${missiles[i].left}px; top:${missiles[i].top}px'></div>`;
            }
        }

        function moveMissiles() {
            for (var i = 0; i < missiles.length; i++) {
                missiles[i].top = missiles[i].top - 8
            }
        }

        function drawEnemies() {
            document.getElementById('enemies').innerHTML = ""
            for (var i = 0; i < enemies.length; i++) {
                document.getElementById('enemies').innerHTML +=
                    `<div class='enemy' style='left:${enemies[i].left}px; top:${enemies[i].top}px'></div>`;
            }
        }

        function moveEnemies() {
            for (var i = 0; i < enemies.length; i++) {
               
                if (enemies[i].top >= 680) {
                	enemies[i].top = 50;
                } else {
                	enemies[i].top = enemies[i].top + 8;
                }
                
            }
        }

        function collisionDetection() {
            for (var enemy = 0; enemy < enemies.length; enemy++) {
                for (var missile = 0; missile < missiles.length; missile++) {
                    if (
                        missiles[missile].left >= enemies[enemy].left &&
                        missiles[missile].left <= (enemies[enemy].left + 50) &&
                        missiles[missile].top <= (enemies[enemy].top + 50) &&
                        missiles[missile].top >= enemies[enemy].top
                    ) {
                        enemies.splice(enemy, 1);
                        missiles.splice(missiles, 1);
                    }
                }
            }
        }


        function collisionDetectionNave(){
            
        	
        	for (var enemy = 0; enemy < enemies.length; enemy++) {
            	if (
                        hero.left >= enemies[enemy].left -10 &&
                        hero.left <= (enemies[enemy].left + 50) &&
                        hero.top <= (enemies[enemy].top + 50) &&
                        hero.top >= enemies[enemy].top +10
                    ) {
                        
                    	enemies.splice(enemy, 1);
                        document.getElementById('hero').style.display = "none";
                       alert("Ya perdiste");
                    
                   	 }
                
            }
            
            
            				
			}
        

        function gameLoop() {
            setTimeout(gameLoop, 50);
            moveMissiles();
            drawMissiles();
            moveEnemies();
            drawEnemies();
            collisionDetection();
            collisionDetectionNave();
        }

        gameLoop()
    </script>
</body>

</html>