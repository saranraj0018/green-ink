<footer class="my-container bg-cover bg-center bg-no-repeat pt-10 pb-5 space-y-3"
    style="background-image: url({{ asset('assets/fbg.png') }})">
    <div class="grid grid-cols-12 gap-2 lg:gap-18">
        <div class="col-span-12 md:col-span-4 space-y-3">
            <img src={{ asset('assets/flogo.png') }} alt="logo">
            <p class="text-white text-sm font-medium">
                Transform your career with world-class education. Learn industry experts and gain skills that matter.
            </p>
            <p class="text-white text-lg font-semibold">
                Follow us
            </p>
            <div class="flex gap-3">
                <a href="#" class="instagram"></a>
                <a href="#" class="Facebook"></a>
                <a href="#" class="linkedin"></a>
            </div>
        </div>
        <div class="col-span-12 md:col-span-2 space-y-3"></div>
        <div class="col-span-12 md:col-span-3 space-y-3">
            <h3 class="text-white text-lg font-semibold">
                Platform
            </h3>
            <div>
                <ul class="space-y-3">
                    <li><a href="/about" class="text-white text-sm">About Us</a></li>
                    <li><a href="/careers" class="text-white text-sm">Careers</a></li>
                    <li><a href="/features" class="text-white text-sm">Features</a></li>
                    <li><a href="/contact" class="text-white text-sm">Contact</a></li>
                </ul>
            </div>

        </div>

        <div class="col-span-12 md:col-span-3 space-y-3">
            <h3 class="text-white text-lg font-semibold">
                Top Courses
            </h3>
            <div>
                <ul class="space-y-3">
                    <li><a href="/courses" class="text-white text-sm">Web Development</a></li>
                    <li><a href="/courses" class="text-white text-sm">Data Science</a></li>
                    <li><a href="/courses" class="text-white text-sm">Business</a></li>
                    <li><a href="/courses" class="text-white text-sm">Design</a></li>
                </ul>
            </div>

        </div>


    </div>
    <div>
        <div class="flex flex-col md:flex-row justify-between">
            <p class="text-white text-sm">
                @ 2025 GreenInk Academy. All rights reserved.
            </p>
            <div class="flex flex-col md:flex-row gap-2">
                <a href="#" class="text-white text-sm">
                    Privacy Policy
                </a>
                <a href="#" class="text-white text-sm">
                    Terms of Service
                </a>
            </div>
        </div>
    </div>

</footer>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        const instagram = `
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.96201 0.288803C7.43805 -0.0962678 10.946 -0.0962678 14.422 0.288803C16.321 0.500803 17.852 1.9958 18.075 3.9018C18.487 7.42647 18.487 10.9871 18.075 14.5118C17.852 16.4178 16.321 17.9128 14.423 18.1258C10.9466 18.5109 7.43838 18.5109 3.96201 18.1258C2.06301 17.9128 0.532013 16.4178 0.309013 14.5128C-0.103004 10.9878 -0.103004 7.4268 0.309013 3.9018C0.532013 1.9958 2.06301 0.500803 3.96201 0.288803ZM14.192 3.2068C13.9268 3.2068 13.6724 3.31216 13.4849 3.4997C13.2974 3.68723 13.192 3.94159 13.192 4.2068C13.192 4.47202 13.2974 4.72637 13.4849 4.91391C13.6724 5.10145 13.9268 5.2068 14.192 5.2068C14.4572 5.2068 14.7116 5.10145 14.8991 4.91391C15.0867 4.72637 15.192 4.47202 15.192 4.2068C15.192 3.94159 15.0867 3.68723 14.8991 3.4997C14.7116 3.31216 14.4572 3.2068 14.192 3.2068ZM4.44201 9.2068C4.44201 7.94702 4.94246 6.73884 5.83326 5.84805C6.72405 4.95725 7.93223 4.4568 9.19201 4.4568C10.4518 4.4568 11.66 4.95725 12.5508 5.84805C13.4416 6.73884 13.942 7.94702 13.942 9.2068C13.942 10.4666 13.4416 11.6748 12.5508 12.5656C11.66 13.4564 10.4518 13.9568 9.19201 13.9568C7.93223 13.9568 6.72405 13.4564 5.83326 12.5656C4.94246 11.6748 4.44201 10.4666 4.44201 9.2068Z" fill="white"/>
            </svg>
        `;
        const tickElements = document.getElementsByClassName('instagram');
        for (let i = 0; i < tickElements.length; i++) {
            tickElements[i].innerHTML = instagram;
        }
        const facebook = `
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none">
            <path d="M11.5 19.888C16.311 19.164 20 15.013 20 10C20 4.477 15.523 0 10 0C4.477 0 0 4.477 0 10C0 15.013 3.689 19.165 8.5 19.888V13H7C6.60218 13 6.22064 12.842 5.93934 12.5607C5.65804 12.2794 5.5 11.8978 5.5 11.5C5.5 11.1022 5.65804 10.7206 5.93934 10.4393C6.22064 10.158 6.60218 10 7 10H8.5V8C8.5 7.07174 8.86875 6.1815 9.52513 5.52513C10.1815 4.86875 11.0717 4.5 12 4.5H12.5C12.8978 4.5 13.2794 4.65804 13.5607 4.93934C13.842 5.22064 14 5.60218 14 6C14 6.39782 13.842 6.77936 13.5607 7.06066C13.2794 7.34196 12.8978 7.5 12.5 7.5H12C11.8674 7.5 11.7402 7.55268 11.6464 7.64645C11.5527 7.74021 11.5 7.86739 11.5 8V10H13C13.3978 10 13.7794 10.158 14.0607 10.4393C14.342 10.7206 14.5 11.1022 14.5 11.5C14.5 11.8978 14.342 12.2794 14.0607 12.5607C13.7794 12.842 13.3978 13 13 13H11.5V19.888Z" fill="white"/>
            </svg>
        `;
        const tickElements2 = document.getElementsByClassName('facebook');
        for (let i = 0; i < tickElements2.length; i++) {
            tickElements2[i].innerHTML = facebook;
        }
        const linkedin = `
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none">
            <path d="M15.053 0H4.447C3.26758 0 2.13647 0.468522 1.3025 1.3025C0.468522 2.13647 0 3.26758 0 4.447V15.053C0 16.2324 0.468522 17.3635 1.3025 18.1975C2.13647 19.0315 3.26758 19.5 4.447 19.5H15.053C16.2324 19.5 17.3635 19.0315 18.1975 18.1975C19.0315 17.3635 19.5 16.2324 19.5 15.053V4.447C19.5 3.26758 19.0315 2.13647 18.1975 1.3025C17.3635 0.468522 16.2324 0 15.053 0ZM6.593 15.742C6.59614 15.7964 6.58811 15.8509 6.56942 15.9021C6.55072 15.9534 6.52176 16.0002 6.4843 16.0398C6.44684 16.0794 6.40167 16.111 6.35158 16.1325C6.30149 16.154 6.24752 16.1651 6.193 16.165H4.413C4.30566 16.1624 4.20362 16.1178 4.12883 16.0407C4.05403 15.9637 4.01244 15.8604 4.013 15.753V8.35C4.01153 8.29655 4.02079 8.24335 4.04023 8.19355C4.05967 8.14374 4.0889 8.09834 4.1262 8.06002C4.16349 8.0217 4.20808 7.99125 4.25734 7.97047C4.3066 7.94968 4.35953 7.93898 4.413 7.939H6.193C6.24647 7.93898 6.2994 7.94968 6.34866 7.97047C6.39792 7.99125 6.44251 8.0217 6.4798 8.06002C6.5171 8.09834 6.54633 8.14374 6.56577 8.19355C6.58521 8.24335 6.59447 8.29655 6.593 8.35V15.742ZM5.27 6.382C5.07729 6.38056 4.88674 6.34117 4.70925 6.26608C4.53176 6.191 4.37079 6.08169 4.23554 5.9444C4.10029 5.80711 3.99341 5.64452 3.921 5.46593C3.84858 5.28733 3.81206 5.09621 3.8135 4.9035C3.81494 4.71079 3.85433 4.52024 3.92942 4.34275C4.0045 4.16526 4.11381 4.00429 4.2511 3.86904C4.38839 3.73379 4.55098 3.62691 4.72957 3.5545C4.90817 3.48208 5.09929 3.44556 5.292 3.447C5.67452 3.45944 6.03703 3.62087 6.30219 3.89686C6.56734 4.17284 6.71415 4.54152 6.71128 4.92423C6.7084 5.30694 6.55609 5.67337 6.28682 5.94535C6.01755 6.21732 5.65266 6.3733 5.27 6.38M16.087 15.73C16.0865 15.831 16.0469 15.928 15.9764 16.0003C15.9058 16.0727 15.81 16.1149 15.709 16.118H13.83C13.7288 16.1149 13.6328 16.0726 13.5623 16C13.4918 15.9274 13.4522 15.8302 13.452 15.729V12.305C13.452 11.794 13.608 10.082 12.096 10.082C10.917 10.082 10.684 11.282 10.639 11.816V15.807C10.639 15.9084 10.5996 16.0058 10.529 16.0786C10.4585 16.1514 10.3623 16.1939 10.261 16.197H8.438C8.33474 16.1967 8.2358 16.1555 8.16287 16.0824C8.08995 16.0093 8.049 15.9103 8.049 15.807V8.314C8.05212 8.21266 8.09458 8.11652 8.16739 8.04595C8.24019 7.97539 8.33761 7.93595 8.439 7.936H10.261C10.3624 7.93595 10.4598 7.97539 10.5326 8.04595C10.6054 8.11652 10.6479 8.21266 10.651 8.314V8.959C10.917 8.56962 11.2843 8.26027 11.7133 8.0643C12.1422 7.86834 12.6165 7.7932 13.085 7.847C16.12 7.847 16.109 10.682 16.109 12.294L16.087 15.73Z" fill="white"/>
            </svg>
        `;
        const tickElements3 = document.getElementsByClassName('linkedin');
        for (let i = 0; i < tickElements3.length; i++) {
            tickElements3[i].innerHTML = linkedin;
        }

    });
</script>
