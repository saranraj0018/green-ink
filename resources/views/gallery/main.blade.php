    @php
    $galleryImages = [

        '/assets/gallery/second-updates/imgs (1).jpg',
        '/assets/gallery/second-updates/imgs (2).jpg',
        '/assets/gallery/second-updates/imgs (3).jpg',
        '/assets/gallery/second-updates/imgs (4).jpg',
        '/assets/gallery/second-updates/imgs (5).jpg',
        '/assets/gallery/second-updates/imgs (6).jpg',
        '/assets/gallery/second-updates/imgs (7).jpg',
        '/assets/gallery/second-updates/imgs (8).jpg',
        '/assets/gallery/second-updates/imgs (9).jpg',
        '/assets/gallery/second-updates/imgs (10).jpg',
        '/assets/gallery/second-updates/imgs (11).jpg',
        '/assets/gallery/second-updates/imgs (12).jpg',
        '/assets/gallery/second-updates/imgs (13).jpg',
        '/assets/gallery/second-updates/imgs (14).jpg',
        '/assets/gallery/second-updates/imgs (15).jpg',
        '/assets/gallery/second-updates/imgs (16).jpg',
        '/assets/gallery/second-updates/imgs (17).jpg',
        '/assets/gallery/second-updates/imgs (18).jpg',
        '/assets/gallery/second-updates/imgs (19).jpg',
        '/assets/gallery/second-updates/imgs (20).jpg',
        '/assets/gallery/second-updates/imgs (21).jpg',
        '/assets/gallery/second-updates/imgs (22).jpg',
    ];
@endphp

<x-partials.header/>

    <section class="bg-primary py-10 md:py-20">

       <div class="text-center text-white font-bold text-5xl uppercase lg:mt-20">
        Gallery
       </div>
   </section>


<!--gallery-->
<section class="my-container py-10 bg-white">
    <!-- <p class="text-center text-sm text-gray-500 py-2">
        Snapshots of our vibrant learning community
    </p> -->

    <!-- Masonry -->
    <div class="columns-2 md:columns-3 gap-4 py-6">
        @foreach ($galleryImages as $index => $image)
            <div class="mb-4 break-inside-avoid">
                <img src="{{ $image }}" onclick="openGallery({{ $index }})"
                    class="w-full rounded-xl cursor-zoom-in transition hover:opacity-90" alt="Gallery image" />
            </div>
        @endforeach
    </div>
</section>


<script>
    const images = @json($galleryImages);
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightboxImg');

    function openGallery(index) {
        lightbox.classList.remove('hidden');
        lightboxImg.src = images[index];
        document.body.style.overflow = 'hidden';
    }

    function closeGallery() {
        lightbox.classList.add('hidden');
        lightboxImg.src = '';
        document.body.style.overflow = 'auto';
    }

    // Close on background click
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            closeGallery();
        }
    });
</script>
<x-partials.footer/>
