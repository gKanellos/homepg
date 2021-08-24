<?php /* Template Name: homepage1 */ ?>

<?php get_header(); ?>


<div id="content">
    <div class="container active">

                <div class="section section-content clearfix  " data-arts-os-animation="animated">
                    <div class="section-content__inner">
                        <div class="section-content__wrapper-heading">
                            <div class="section-content__heading split-text" data-split-text-type="lines,words"
                                data-split-text-set="words">
                                
                                <h2>
                                    <div class="split-text__line overflow"
                                        style="display: block; text-align: left; position: relative; opacity: 1; visibility: inherit; transform: translate(0%, 0%);">
                                        <span style="color: #e5e8ea;">
                                            <div style="position: relative; display: inline-block; transform: translate(0px, 0%);"
                                                class="split-text__word">I’m</div> <span style="color: #FF2633;">
                                                <div style="position: relative; display: inline-block; transform: translate(0px, 0%);"
                                                    class="split-text__word">Gabrielle</div>
                                                <div style="position: relative; display: inline-block; transform: translate(0px, 0%);"
                                                    class="split-text__word">Kanellos</div>
                                            </span>
                                            <div style="position: relative; display: inline-block; transform: translate(0px, 0%);"
                                                class="split-text__word">,</div>
                                            <div style="position: relative; display: inline-block; transform: translate(0px, 0%);"
                                                class="split-text__word">a</div>
                                            <div style="position: relative; display: inline-block; transform: translate(0px, 0%);"
                                                class="split-text__word">designer</div>
                                            <div style="position: relative; display: inline-block; transform: translate(0px, 0%);"
                                                class="split-text__word">and</div>
                                            <div style="position: relative; display: inline-block; transform: translate(0px, 0%);"
                                                class="split-text__word">front-end</div>
                                            <div style="position: relative; display: inline-block; transform: translate(0px, 0%);"
                                                class="split-text__word">developer.</div>
                                        </span></div>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div> <!-- to here-->

        <div class="scroll-down">
            <p style="color:white"> Scroll to Discover</p>    
            <div class="scroller"></div>
        </div>
    </div>
    <canvas class="webgl"></canvas>
</div>


<div style="display:none">
    <div>



        <style>
        * {
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100vh;

            background: rgb(24, 24, 24);

        }

        body {
            overflow-x: hidden;
        }

        .webgl {
            position: absolute;
            top: 0;
            left: 0;
            outline: none;
            mix-blend-mode: difference;
        }

        .container {
            height: 100vh;
            display: grid;
            place-items: center;
        }

        h1 {
            font-size: 8rem;
            text-transform: uppercase;
            color: white;
        }

        section {
            height: 100vh;
            background: white;
        }

        .scroller {
        margin-top:20px;
        width: 2px;
        height: 15px;
        border-radius: 25%;
        background-color: #fff;
        animation-name: scroll;
        animation-duration: 2.2s;
        margin:3rem;
        animation-iteration-count: infinite;
        margin:0px auto;
        }

        .scroll-down{
        position:absolute;
        top:80%;
        display:block;
        text-align:center;
        right:50%;
        }

        @keyframes scroll {
        0% { opacity: 0; }
        5% { transform: translateY(0); opacity: 1; }
        100% { transform: translateY(25px); opacity: 0;}
        }
        </style>

        <script>
        //Loading
        const textureLoader = new THREE.TextureLoader()

        // Canvas
        const canvas = document.querySelector('canvas.webgl')

        // Scene
        const scene = new THREE.Scene()
        scene.background = new THREE.Color(0x0f1c28);

        // Objects
        const geometry = new THREE.PlaneGeometry(.9, .9);
        const geometry2 = new THREE.PlaneGeometry(1,.75);
        const geometry3 = new THREE.PlaneGeometry(.75, 1);


        const material = new THREE.MeshBasicMaterial({
            map: textureLoader.load('https://gabriellekanellos.com/wp-content/uploads/2021/07/Delta-banner.jpg')
        });
        const material2 = new THREE.MeshBasicMaterial( {color: 0xffff00} );
        // image 1

        material2.color = new THREE.Color(0xff0000)

        const image1 = new THREE.Mesh(geometry, material)
        image1.position.set(1, -.8)
        //image 2
        const image2 = new THREE.Mesh(geometry, material2)
        image2.position.set(-.1, .7)
        //image 3
        const image3 = new THREE.Mesh(geometry2, material2)
        image3.position.set(1.5, .5)
        //image 4
        const image4 = new THREE.Mesh(geometry2, material2)
        image4.position.set(-1.5, -.7)
        // image 5
        const image5 = new THREE.Mesh(geometry3, material2)
        image5.position.set(-1.7, .8)

        scene.add(image1, image2, image3, image4, image5)
        

        let objs = [image1, image2, image3, image4, image5]


        // Lights

        const pointLight = new THREE.PointLight(0xffffff, 0.1)
        pointLight.position.x = 2
        pointLight.position.y = 3
        pointLight.position.z = 4
        scene.add(pointLight)


        /**
         * Sizes
         */
        const sizes = {
            width: window.innerWidth,
            height: window.innerHeight
        }

        window.addEventListener('resize', () => {
            // Update sizes
            sizes.width = window.innerWidth
            sizes.height = window.innerHeight

            // Update camera
            camera.aspect = sizes.width / sizes.height
            camera.updateProjectionMatrix()

            // Update renderer
            renderer.setSize(sizes.width, sizes.height)
            renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))
        })

        /**
         * Camera
         */
        // Base camera
        const camera = new THREE.PerspectiveCamera(75, sizes.width / sizes.height, 0.1, 100)
        camera.position.x = 0
        camera.position.y = 0
        camera.position.z = 2
        scene.add(camera)

        // Controls
        // const controls = new OrbitControls(camera, canvas)
        // controls.enableDamping = true

        /**
         * Renderer
         */
        const renderer = new THREE.WebGLRenderer({
            canvas: canvas,
            //makes background transparent so can set it in CSS
            alpha: true,
            antialias: true
        })
        renderer.setSize(sizes.width, sizes.height)
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2))

        /**
         * Animate
         */

        document.addEventListener('mousemove', onDocumentMouseMove)
        let mouseX = 0;
        let mouseY = 0;

        let targetX = 0;
        let targetY = 0;

        const windowHalfX = window.innerWidth / 2;
        const windowHalfY = window.innerHeight / 2;

        function onDocumentMouseMove(event) {
            mouseX = (event.clientX - windowHalfX)
            mouseY = (event.clientY - windowHalfY)
        }



        const clock = new THREE.Clock()

        const tick = () => {

            targetX = mouseX * .0005
            targetY = mouseY * .0005

            const elapsedTime = clock.getElapsedTime()

            // Update objects
            // sphere.rotation.y = .2 * elapsedTime
            for (const image of objs) {
                image.rotation.y += .05 * (targetX - image.rotation.y)
                image.rotation.x += .06 * (targetY - image.rotation.x)
                image.position.z += .05 * (targetY - image.rotation.x)
            }
            // Update Orbital Controls
            // controls.update()

            // Render
            renderer.render(scene, camera)

            // Call tick again on the next frame
            window.requestAnimationFrame(tick)
        }

        tick()


        //Capture the scroll wheel
        window.addEventListener('wheel', (e) => {
            //Scroll Up
            if (e.deltaY < 0) {
                changePg(-1);
                //Scroll Down
            } else if (e.deltaY > 0) {
                changePg(1);
            }
        });

        function changePg(i) {
            const activeSection = document.querySelector('#content div.active');


            if (i == 1 && activeSection.nextElementSibling) {
                window.open("/projects", '_self', false);

            }
        }
        </script>


        <?php get_footer(); ?>
