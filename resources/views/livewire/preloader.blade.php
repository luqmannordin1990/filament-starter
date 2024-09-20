<div>
    @assets
    <style>

/* HTML: <div class="loader"></div> */
.loader {
  --c1:#673b14;
  --c2:#f8b13b;
  width: 40px;
  height: 80px;
  border-top: 4px solid var(--c1);
  border-bottom: 4px solid var(--c1);
  background: linear-gradient(90deg, var(--c1) 2px, var(--c2) 0 5px,var(--c1) 0) 50%/7px 8px no-repeat;
  display: grid;
  overflow: hidden;
  animation: l5-0 2s infinite linear;
}
.loader::before,
.loader::after {
  content: "";
  grid-area: 1/1;
  width: 75%;
  height: calc(50% - 4px);
  margin: 0 auto;
  border: 2px solid var(--c1);
  border-top: 0;
  box-sizing: content-box;
  border-radius: 0 0 40% 40%;
  -webkit-mask: 
    linear-gradient(#000 0 0) bottom/4px 2px no-repeat,
    linear-gradient(#000 0 0);
  -webkit-mask-composite: destination-out;
          mask-composite: exclude;
  background: 
    linear-gradient(var(--d,0deg),var(--c2) 50%,#0000 0) bottom /100% 205%,
    linear-gradient(var(--c2) 0 0) center/0 100%;
  background-repeat: no-repeat;
  animation: inherit;
  animation-name: l5-1;
}
.loader::after {
  transform-origin: 50% calc(100% + 2px);
  transform: scaleY(-1);
  --s:3px;
  --d:180deg;
}
@keyframes l5-0 {
  80%  {transform: rotate(0)}
  100% {transform: rotate(0.5turn)}
}
@keyframes l5-1 {
  10%,70%  {background-size:100% 205%,var(--s,0) 100%}
  70%,100% {background-position: top,center}
}

    </style>
    @endassets
   
        <div class="preloader bg-gray-500/50 absolute inset-0 z-50">
            <div class="flex items-center justify-center w-screen h-screen ">
                <div class="loader w-25 h-25"></div>
                <img src="{{ url('assets/loading.gif') }}" alt="">
            </div>
        </div>
    
    @script
    <script>

            Livewire.on('preloader', ({ postId }) => {
                    setTimeout(() =>{
                        document.querySelector('.preloader').style.display = 'none';
                    }, 500)
                });

            document.addEventListener('livewire:navigate', (event) => {
                document.querySelector('.preloader').style.display = 'block';
            }) 
            document.addEventListener('livewire:navigated', () => {
                setTimeout(() =>{
                        document.querySelector('.preloader').style.display = 'none';
                    }, 500)
            })

    </script>
    @endscript
</div>