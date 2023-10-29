<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.main','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>


    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('navbar.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>


    <section>

        <div class="flex min-h-screen items-center justify-around bg-gray-50 px-16">
            <div class="flex flex-col gap-y-2">
                <h1 class="text-5xl font-bold text-slate-600 underline underline-offset-4">GREENLY</h1>
                <p class="mt-3 w-96 text-xs text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Nesciunt, impedit delectus. Possimus saepe facilis tenetur corporis obcaecati iste similique
                    aspernatur incidunt! Incidunt minus dolorem repudiandae architecto explicabo ratione unde rerum.</p>

                <div>
                    <a class="btn btn-outline mt-2" href="#product">Learn More</a>
                </div>
            </div>
            <div class="relative w-full max-w-lg">
                <div
                    class="absolute animation-delay-5000 -left-4 top-0 h-72 w-72 animate-blob rounded-full bg-lime-400 opacity-70 mix-blend-multiply blur-xl filter">
                </div>
                <div
                    class="animation-delay-2000 absolute -right-4 top-0 h-72 w-72 animate-blob rounded-full bg-lime-300 opacity-70 mix-blend-multiply blur-xl filter">
                </div>
                <div
                    class="animation-delay-4000 absolute -bottom-8 left-20 h-72 w-72 animate-blob rounded-full bg-lime-600 opacity-70 mix-blend-multiply blur-xl filter">
                </div>
                <div class=" relative m-8 flex justify-center space-y-4">
                    
                    <div class="w-67 h-67">
                        <div class="container bg-white/20 rounded-full backdrop-blur-lg drop-shadow-lg">
                            <div class="avatar">
                                <div class="rounded object-fill">

                                    <img src="storage/welcome.png" />

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>


    <section id="product">

        <div
            class="w-full  bg-[url('https://img.freepik.com/premium-photo/empty-wooden-table-product-display-with-blur-background-tropical-jungle-generative-ai-aig30_31965-197303.jpg')] bg-cover bg-center h-fit">
            <div class="w-full h-full flex flex-col justify-center items-center backdrop-blur-md">
                <div class="hero min-h-screen">
                    <div class="hero-content flex-row gap-24">
                        <div>
                            <h1 class="max-w-lg"><span
                                    class="text-xl underline decoration-lime-500 text-lime-500 uppercase font-bold underline-offset-4">Greenly</span>
                                <span class="text-base font-mono text-white">is an online store that offers a variety of
                                    plants for you
                                    to care for. We are dedicated and passionate about the health benefits that
                                    gardening
                                    and spending time in nature can bring.</span>
                            </h1>


                        </div>

                        <div>

                            <div class="grid grid-flow-row grid-cols-2 gap-5 debug w-full">
                                <div class="card w-72 bg-base-100 shadow-xl">
                                    <figure><img
                                            src="https://bf.kendal.org/wp-content/uploads/sites/13/2020/06/AdobeStock_83987702-scaled-e1592924721859.jpeg"
                                            alt="Shoes" class="h-[200px] w-full object-cover" /></figure>
                                    <div class="card-body">
                                        <h2 class="card-title">About Us</h2>
                                        <div class="card-actions justify-start">
                                            <a href="<?php echo e(route('about')); ?>">
                                            <button class="btn btn-primary">read more</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card w-72 bg-base-100 shadow-xl">
                                    <figure><img class="h-[200px] w-full object-cover"
                                            src="https://a57.foxnews.com/static.foxnews.com/foxnews.com/content/uploads/2023/07/1200/675/friends-gardening.jpg?ve=1&tl=1"
                                            alt="Shoes" /></figure>
                                    <div class="card-body">
                                        <h2 class="card-title">Our People</h2>
                                        <div class="card-actions justify-start">
                                            <a href="<?php echo e(route('people')); ?>">
                                            <button class="btn btn-primary">read more</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card w-72 bg-base-100 shadow-xl">
                                    <figure><img class="h-[200px] w-full object-cover"
                                            src="https://cdn.iview.abc.net.au/thumbs/1200/rf/RF2205V_63d9e5ce32b91_3600.jpg"
                                            alt="Shoes" /></figure>
                                    <div class="card-body">
                                        <h2 class="card-title">Our Vision</h2>
                                        <div class="card-actions justify-start">
                                            <a href="<?php echo e(route('vision')); ?>">
                                            <button class="btn btn-primary">read more</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card w-72 bg-base-100 shadow-xl">
                                    <figure><img class="h-[200px] w-full object-cover"
                                            src="https://cdn.mos.cms.futurecdn.net/nbtzNri7PxqGyJKCFpNAk9.jpg"
                                            alt="Shoes" /></figure>
                                    <div class="card-body">
                                        <h2 class="card-title">What We Do</h2>
                                        <div class="card-actions justify-start">
                                            <a href="<?php echo e(route('what')); ?>">
                                            <button class="btn btn-primary">read more</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                < </div>
    </section>

    <section class="h-screen max-w-full" id="catalog">
        <div class="flex h-full w-full items-center justify-around">

            <?php echo $__env->make('items.typography.catalog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
            <?php echo $__env->make('items.slide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </section>






    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footer.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>




 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH /home/kahfi/plants-web/resources/views/Home/index.blade.php ENDPATH**/ ?>