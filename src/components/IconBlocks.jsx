import React from 'react';

const IconBlocks = () => {
  return (
    <div className="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
      <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        {/* Pikiran Kreatif */}
        <div className="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5 dark:border-neutral-700">
          <div className="flex justify-center items-center size-12 bg-gradient-to-br from-blue-600 to-violet-600 rounded-lg mx-auto">
            <svg className="shrink-0 size-7 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><rect width="18" height="10" x="3" y="11" rx="2"/><circle cx="12" cy="5" r="2"/><path d="M12 7v4"/><line x1="8" x2="8" y1="16" y2="16"/><line x1="16" x2="16" y1="16" y2="16"/></svg>
          </div>
          <div className="mt-3">
            <h3 className="text-sm sm:text-lg font-semibold text-gray-800 dark:text-neutral-200">
              Pikiran Kreatif
            </h3>
          </div>
        </div>

        {/* Repeat similar structure for other blocks */}
        {/* You can add the remaining 7 blocks following the same pattern */}

      </div>
    </div>
  );
};

export default IconBlocks;
