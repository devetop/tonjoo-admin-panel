import { Head, Link, useForm } from "@inertiajs/react";
import ContentLayout from "../../../_component/ContentLayout";
import { SectionHeader, SectionTitle } from "../../../_component/SectionHeader";
import Button from "../../../_component/Button";
import TagForm from "./Includes/TagForm";
import TapHead from "../../../_component/TapHead";

export default function Edit({ tag }) {
  const { data, setData, errors, put } = useForm({ ...tag });
  
  const saveAttempt = (e) => {
    e.preventDefault();

    put(
      route("cms.post.tag.update", {
        tag: tag.id,
      })
    );
  };

  return (
    <ContentLayout
      sectionHeader={
        <SectionHeader>
          <SectionTitle>
            Edit Tag
            <Link href={route("cms.post.tag.create")}>
              <Button size="sm" color="primary" className="ml-2">
                Add New
              </Button>
            </Link>
          </SectionTitle>
        </SectionHeader>
      }
    >
      <TapHead title="Edit Tag" />

      <TagForm
        data={data}
        setData={setData}
        errors={errors}
        onSubmit={saveAttempt}
        cancelUrl={route("cms.post.tag.index")}
      />
    </ContentLayout>
  );
}
