import React, { useEffect } from 'react';
import Link from 'next/link';
import { Button } from '@/components/ui/button';
import { useForm } from 'react-hook-form';
import { ConfigContent } from '../ConfigContent';
import { MainContent } from '../MainContent';
import { SeoContent } from '../SeoContent';
import { SlidersContent } from '../SlidersContent';
import { TermsContent } from '../TermsContent';

export default function ProductForm({
  mode = 'create',
  defaultValues,
  onSubmitHandler,
  error,
}) {
  const { handleSubmit, register, control, setValue, reset } = useForm({
    defaultValues: {
      title: '',
      slug: '',
      content: '',
      status: '',
      author_id: '',
      meta: {
        sub_title: '',
        meta_title: '',
        meta_description: '',
        page_template: '',
        featured_image_url: '',
        sliders: [],
      },
      term: {
        product_category: [],
        product_tag: [],
      },
    },
  });

  useEffect(() => {
    if (mode === 'edit' && defaultValues) {
      reset(defaultValues);
    }
  }, [mode, defaultValues, reset]);

  return (
    <form
      className='m-3 grid grid-cols-12 gap-4'
      onSubmit={handleSubmit(onSubmitHandler)}
    >
      <div className='col-span-12 lg:col-span-9 grid gap-4 auto-rows-max'>
        <MainContent register={register} errors={error?.errors} />
        <SeoContent register={register} errors={error?.errors} />
        <SlidersContent
          register={register}
          control={control}
          errors={error?.meta?.sliders}
        />
      </div>
      <div className='col-span-12 lg:col-span-3 flex-col-reverse lg:flex-col gap-4 auto-rows-max'>
        <div className='border rounded-md shadow-md p-4 mb-4'>
          <h1 className='font-bold'>Action</h1>
          <div className='grid grid-cols-2 gap-2'>
            <Link href={'/admin/products'}>
              <Button
                variant='outline'
                type='button'
                className='w-full'
              >
                Back
              </Button>
            </Link>
            <Button>Submit</Button>
          </div>
        </div>
        <div className='grid gap-4'>
          <ConfigContent
            setFeaturedImageUrlValue={(newValue) =>
              setValue('meta.featured_image_url', newValue)
            }
            register={register}
            control={control}
            errors={error?.errors}
          />
          <TermsContent control={control} />
        </div>
      </div>
    </form>
  );
}
