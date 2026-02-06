    @php
    $galleryImages = [
        '/assets/gallery/img (1).jpg',
        '/assets/gallery/img (2).jpg',
        '/assets/gallery/img (3).jpg',
        '/assets/gallery/img (4).jpg',
        '/assets/gallery/img (5).jpg',
        '/assets/gallery/img (6).jpg',
        '/assets/gallery/img (7).jpg',
        '/assets/gallery/img (8).jpg',
        '/assets/gallery/img (9).jpg',
        '/assets/gallery/img (10).jpg',
        '/assets/gallery/img (11).jpg',
        '/assets/gallery/img (12).jpg',
        '/assets/gallery/img (13).jpg',
        '/assets/gallery/img (14).jpg',
        '/assets/gallery/img (15).jpg',
        '/assets/gallery/img (16).jpg',
        '/assets/gallery/img (17).jpg',
        '/assets/gallery/img (18).jpg',
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
    <p class="text-center text-sm text-gray-500 py-2">
        Snapshots of our vibrant learning community
    </p>

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
