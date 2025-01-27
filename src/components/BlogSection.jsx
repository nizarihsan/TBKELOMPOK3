import React from 'react';

const BlogSection = () => {
  return (
    <section className="pt-20 pb-10 lg:pt-[120px] lg:pb-20 bg-white dark:bg-dark">
      <div className="container mx-auto">
        <div className="flex flex-wrap justify-center -mx-4">
          <div className="w-full px-4">
            <div className="mx-auto mb-[60px] max-w-[510px] text-center lg:mb-20">
              <span className="block mb-2 text-lg font-semibold text-primary">
                Blog Kami
              </span>
              <h2 className="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px] dark:text-white">
                Berita Terbaru Kami
              </h2>
              <p className="text-base text-body-color dark:text-dark-6">
                Lorem Ipsum adalah teks dummy dari industri percetakan dan pengetikan.
              </p>
            </div>
          </div>
        </div>
        <div className="flex flex-wrap -mx-4">
          {/* Blog Card 1 */}
          <div className="w-full px-4 md:w-1/2 lg:w-1/3">
            <div className="w-full mb-10">
              <div className="mb-8 overflow-hidden rounded">
                <img
                  src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-01.jpg"
                  alt="image"
                  className="w-full"
                />
              </div>
              <div>
                <span className="inline-block px-4 py-1 mb-5 text-xs font-semibold leading-loose text-center text-white rounded bg-primary">
                  Dec 22, 2023
                </span>
                <h3>
                  <a href="javascript:void(0)" className="inline-block mb-4 text-xl font-semibold text-dark dark:text-white hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                    Kenali AutoManage, alat manajemen AI terbaik
                  </a>
                </h3>
                <p className="text-base text-body-color dark:text-dark-6">
                  Lorem Ipsum adalah teks dummy dari industri percetakan dan pengetikan.
                </p>
              </div>
            </div>
          </div>

          {/* Blog Card 2 */}
          <div className="w-full px-4 md:w-1/2 lg:w-1/3">
            {/* Similar structure as Blog Card 1, just change image and content */}
          </div>

          {/* Blog Card 3 */}
          <div className="w-full px-4 md:w-1/2 lg:w-1/3">
            {/* Similar structure as Blog Card 1, just change image and content */}
          </div>
        </div>
      </div>
    </section>
  );
};

export default BlogSection;
