
var ua = window.navigator.userAgent;
    if (ua.indexOf('MSIE ') < 0 && ua.indexOf('Trident/') < 0) {
        // alert('??');
        // 캔버스 그래프
        function graphAni(){
            let canvas , ctx , w , h , lines = [];
            let point = [
                {x : 40 , y : 329},
                {x : 139, y : 317},
                {x : 249, y : 298},
                {x : 360, y : 261},
                {x : 469, y : 188},
                {x : 583, y : 97},
            ]
            function canvasInit(){
                canvas = document.getElementById('graph');
                ctx = canvas.getContext('2d');
                canvasSize();
                lines.push(new Line());
            }

            function canvasSize(){
                w = canvas.width = 680;
                h = canvas.height = 381;
            }

            function drawScene(){
                animationLoop();
            }

            function animationLoop(){
                ctx.clearRect(0,0,w,h);
                lines.map(function(l){
                    l.draw();
                    l.update();
                })
                requestAnimationFrame(animationLoop)
            }

            class Line{
                constructor(){
                    this.x = 40;
                    this.y = 329;
                    this.lineX = this.x;
                    this.lineY = this.y;
                    this.progress = 0;
                    this.point = [
                        {x : 40 , y : 329},
                        {x : 139, y : 317},
                        {x : 249, y : 298},
                        {x : 360, y : 261},
                        {x : 469, y : 188},
                        {x : 583, y : 97},
                    ]
                    this.line = [];
                    this.count = 0;
                    this.balls = [new Ball(this.point[0].x , this.point[0].y)];
                    this.lastCheck = false;
                }
                draw(){
                    ctx.beginPath();
                    this.line.map((l , i)=>{
                        ctx.moveTo(this.point[i].x , this.point[i].y);
                        ctx.lineTo(l.x , l.y)
                    })
                    ctx.moveTo(this.point[this.count].x , this.point[this.count].y);
                    ctx.lineTo(this.lineX , this.lineY)
                    ctx.strokeStyle = 'black';
                    ctx.lineWidth = 4
                    ctx.stroke();

                    this.balls.map((b)=>{
                        b.draw();
                        b.update();
                    })
                }
                update(){
                    if(this.count < this.point.length - 1){ 
                        if(this.count == this.point.length - 2){
                            this.lastCheck = true;
                        }
                        if(this.progress <= 1){
                            this.lineX = this.point[this.count].x + (this.progress * (this.point[this.count + 1].x - this.point[this.count].x))
                            this.lineY = this.point[this.count].y + (this.progress * (this.point[this.count + 1].y - this.point[this.count].y))
                            this.progress += 0.1;
                        }else{
                            this.lineX = this.point[this.count + 1].x;
                            this.lineY = this.point[this.count + 1].y;
                            this.line.push({x : this.lineX , y : this.lineY});
                            this.count++;
                            this.progress = 0;
                            this.balls.push(new Ball(this.lineX , this.lineY , this.lastCheck));
                        }
                    }
                    
                }
            }

            class Ball{
                constructor(x , y , lastCheck){
                    this.x = x;
                    this.y = y;
                    this.size = 0;
                    this.lastCheck = lastCheck;
                }

                draw(){
                    if(this.lastCheck){
                        ctx.beginPath();
                        ctx.arc(this.x , this.y , this.size <=19 ? this.size : 19 , 0 , Math.PI * 2 );
                        ctx.fillStyle = 'rgba(250,80,20,1)';
                        ctx.fill()
                        ctx.closePath();

                        ctx.beginPath();
                        ctx.arc(this.x , this.y , this.size <=45 ? this.size : 45 , 0 , Math.PI * 2 );
                        ctx.fillStyle = 'rgba(250,80,20,0.3)';
                        ctx.fill()

                        ctx.beginPath();
                        ctx.arc(this.x , this.y , this.size , 0 , Math.PI * 2 );
                        ctx.fillStyle = 'rgba(250,80,20,0.1)';
                        ctx.fill()
                    }else{
                        ctx.beginPath();
                        ctx.arc(this.x , this.y , this.size, 0 , Math.PI * 2);
                        ctx.fillStyle = 'black';
                        ctx.fill()
                    }
                }

                update(){
                    if(this.lastCheck){
                        if(this.size < 70){
                            this.size = this.size + 0.5; 
                        }
                    }else{
                        if(this.size < 8){
                            this.size = this.size + 0.5; 
                        }
                    }
                }
            }
            canvasInit();
            drawScene();
        }   /* 캔버스 그래프 fin */
    }