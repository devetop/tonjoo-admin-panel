import { Link, Head, useForm } from "@inertiajs/react";
import {
  SectionHeader,
  SectionTitle,
  Breadcrumb,
  BreadcrumbChild,
} from "../../_component/SectionHeader";
import React, { useState, useEffect } from "react";
import ContentLayout from "../../_component/ContentLayout";
import MenuFormCard, { defaultMenuData } from "./Include/MenuFormCard";
import Button from "../../_component/Button";
import TapHead from "../../_component/TapHead";

export default function Edit({ menus }) {
  const { data, setData, post } = useForm(menus);

  const addMenuHandler = () => {
    let newData = [...data];

    newData.push({
      ...defaultMenuData,
      name: `Menu`,
    });
    setData(newData);
  };
  const addSubMenuHandler = (index) => {
    let newData = [...data];
    let indexArr = index.split(",");
    if (indexArr.length == 1) {
      newData[indexArr[0]]["menus"] = [
        ...newData[indexArr[0]]["menus"],
        {
          ...defaultMenuData,
          name: `Sub Menu`,
        }  
      ]
    } else if (indexArr.length == 2) {
      newData[indexArr[0]]["menus"][indexArr[1]]["menus"] = [
        ...newData[indexArr[0]]["menus"][indexArr[1]]["menus"],
        {
          ...defaultMenuData,
          name: `Sub Sub Menu`,
        }  
      ]
    }

    setData(newData);
  };
  const inputOnChangeHandler = (e, index) => {
    let newData = [...data];
    let indexArr = index.split(",");

    const newValue =
      e.target.type === "checkbox" ? e.target.checked : e.target.value;
    if (indexArr.length == 1) {
      //handle menu level 1
      newData[indexArr[0]][e.target.name] = newValue;
    } else if (indexArr.length == 2) {
      //handle menu level 2
      newData[indexArr[0]]["menus"][indexArr[1]][e.target.name] = newValue;
    } else if (indexArr.length == 3) {
      //handle menu level 3
      newData[indexArr[0]]["menus"][indexArr[1]]["menus"][indexArr[2]][
        e.target.name
      ] = newValue;
    }

    setData(newData);
  };
  const onMinimizeHandler = (index) => {
    let newData = [...data];
    let indexArr = index.split(",");

    if (indexArr.length == 1) {
      //handle menu level 1
      newData[indexArr[0]]["display"] =
        newData[indexArr[0]]["display"] == "block" ? "none" : "block";
    } else if (indexArr.length == 2) {
      //handle menu level 2
      newData[indexArr[0]]["menus"][indexArr[1]]["display"] =
        newData[indexArr[0]]["menus"][indexArr[1]]["display"] == "block"
          ? "none"
          : "block";
    } else if (indexArr.length == 3) {
      //handle menu level 3
      newData[indexArr[0]]["menus"][indexArr[1]]["menus"][indexArr[2]][
        "display"
      ] =
        newData[indexArr[0]]["menus"][indexArr[1]]["menus"][indexArr[2]][
          "display"
        ] == "block"
          ? "none"
          : "block";
    }

    setData(newData);
  };
  const onDeleteHandler = (index) => {
    let newData = [...data];

    let indexArr = index.split(",");
    if (indexArr.length == 1) {
      //handle menu level 1
      newData = newData.filter((_, i) => i != indexArr[0]);
    } else if (indexArr.length == 2) {
      //handle menu level 2
      newData[indexArr[0]]["menus"] = newData[indexArr[0]]["menus"].filter(
        (_, i) => i != indexArr[1]
      );
    } else if (indexArr.length == 3) {
      //handle menu level 3
      newData[indexArr[0]]["menus"][indexArr[1]]["menus"] = newData[
        indexArr[0]
      ]["menus"][indexArr[1]]["menus"].filter((_, i) => i != indexArr[2]);
    }

    setData(newData);
  };
  const saveMenuHandler = () => {
    let newData = [...data]
    newData = newData.map((m1) => {
      m1.display = 'none';

      if(m1.menus.length == 0) {
        return m1;
      };

      m1.menus = m1.menus.map((m2) => {
        m2.display = 'none';

        if(m2.menus?.length == 0) {
          return m2;
        };

        m2.menus = m2.menus?.map((m3) => {
          m3.display = 'none'
          return m3;
        })

        return m2
      })

      return m1
    })
    setData(newData)
    post(route('cms.option.menu.store'));
  };
  const moveHandler = (index, type) => {
    let newData = [...data];
    let indexArr = index.split(",");
    let current = null

    if(indexArr.length === 1) {
      current = {...newData[parseInt(indexArr[0])]}

      if(type === 'up-one') {
        if(parseInt(indexArr[0])-1<0) return;

        let before = {...newData[parseInt(indexArr[0])-1]}
        
        newData[parseInt(indexArr[0])-1] = current
        newData[parseInt(indexArr[0])] = before
      }else if(type === 'down-one') {
        if(parseInt(indexArr[0])+2>newData.length) return;

        let after = {...newData[parseInt(indexArr[0])+1]}

        newData[parseInt(indexArr[0])+1] = current
        newData[parseInt(indexArr[0])] = after
      }
    }else if(indexArr.length === 2) {
      current = {...newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]}

      if(type === 'up-one') {
        if(parseInt(indexArr[1])-1<0) {
          newData[parseInt(indexArr[0])]['menus'] = newData[parseInt(indexArr[0])]['menus'].filter((_, i) => i !== parseInt(indexArr[1]));
          newData.splice(parseInt(indexArr[0]), 0, current);
          
          setData(newData);
          return;
        };

        let before = {...newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])-1]}

        newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])-1] = current
        newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])] = before
      }else if(type === 'down-one') {        
        if(parseInt(indexArr[1])+2>newData[parseInt(indexArr[0])]['menus'].length) {
          newData[parseInt(indexArr[0])]['menus'] = newData[parseInt(indexArr[0])]['menus'].filter((_, i) => i !== parseInt(indexArr[1]));
          newData.splice(parseInt(indexArr[0])+1, 0, current);

          setData(newData);
          return
        };

        let after = {...newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])+1]}

        newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])+1] = current
        newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])] = after
      }
    }else if(indexArr.length === 3) {
      current = {...newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]['menus'][parseInt(indexArr[2])]}

      if(type === 'up-one') {
        if(parseInt(indexArr[2])-1<0) {
          newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]['menus'] = newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]['menus'].filter((_, i) => i !== parseInt(indexArr[2]));
          newData[parseInt(indexArr[0])]['menus'].splice(parseInt(indexArr[1]), 0, current);
          
          setData(newData);
          return;
        };

        let before = {...newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]['menus'][parseInt(indexArr[2])-1]}

        newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]['menus'][parseInt(indexArr[2])-1] = current
        newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]['menus'][parseInt(indexArr[2])] = before
      }else if(type === 'down-one') {
        if(parseInt(indexArr[2])+2>newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]['menus'].length) {
          newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]['menus'] = newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]['menus'].filter((_, i) => i !== parseInt(indexArr[2]));
          newData[parseInt(indexArr[0])]['menus'].splice(parseInt(indexArr[1])+1, 0, current);

          setData(newData);
          return
        };

        let after = {...newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]['menus'][parseInt(indexArr[2])+1]}

        newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]['menus'][parseInt(indexArr[2])+1] = current
        newData[parseInt(indexArr[0])]['menus'][parseInt(indexArr[1])]['menus'][parseInt(indexArr[2])] = after
      }
    }

    setData(newData);
  }

  return (
    <ContentLayout
      sectionHeader={
        <>
          <SectionHeader>
            <SectionTitle>Menu</SectionTitle>
            <Breadcrumb>
              <BreadcrumbChild>Options</BreadcrumbChild>
              <BreadcrumbChild>Menu</BreadcrumbChild>
            </Breadcrumb>
          </SectionHeader>
        </>
      }
    >
      <TapHead title="Menu" />

      <section className="row">
        <div className="col-lg-9">
          <div className="card" style={{ borderRadius: 0 }}>
            <div className="card-header" style={{ gap: ".5em" }}>
              <div className="d-flex align-items-center justify-content-between">
                <h5 className="mb-0">Menu</h5>
                <button className="btn btn-primary px-4" onClick={addMenuHandler}>
                  <i className="ph ph-plus mr-2"></i>
                  <span>Add Menu</span>
                </button>
              </div>
            </div>
            <div className="card-body">
              <div className="flex justify-content-end">
                {data.map((menu, index) => (
                  <MenuFormCard
                    key={index}
                    index={`${index}`}
                    cardTitle={menu.name}
                    addSubMenuHandler={addSubMenuHandler}
                    inputOnChangeHandler={inputOnChangeHandler}
                    onMinimizeHandler={onMinimizeHandler}
                    onDeleteHandler={onDeleteHandler}
                    moveHandler={moveHandler}
                    menuData={menu}
                  >
                    {menu.menus.map((menu2, index2) => (
                      <MenuFormCard
                        key={`${index},${index2}`}
                        index={`${index},${index2}`}
                        cardTitle={menu2.name}
                        addSubMenuHandler={addSubMenuHandler}
                        inputOnChangeHandler={inputOnChangeHandler}
                        onMinimizeHandler={onMinimizeHandler}
                        onDeleteHandler={onDeleteHandler}
                        moveHandler={moveHandler}
                        menuData={menu2}
                      >
                        {menu2.menus?.map((menu3, index3) => (
                          <MenuFormCard
                            key={`${index},${index2},${index3}`}
                            index={`${index},${index2},${index3}`}
                            cardTitle={menu3.name}
                            addSubMenuHandler={addSubMenuHandler}
                            inputOnChangeHandler={inputOnChangeHandler}
                            onMinimizeHandler={onMinimizeHandler}
                            onDeleteHandler={onDeleteHandler}
                            moveHandler={moveHandler}
                            menuData={menu3}
                          />
                        ))}
                      </MenuFormCard>
                    ))}
                  </MenuFormCard>
                ))}
              </div>
            </div>
            <div
              className="card-footer d-flex justify-content-end position-sticky bg-light"
              style={{ bottom: 0 }}
            >
              <Button
                color="primary"
                className="text-center px-5"
                onClick={saveMenuHandler}
              >
                Save
              </Button>
            </div>
          </div>
        </div>
      </section>
    </ContentLayout>
  );
}
